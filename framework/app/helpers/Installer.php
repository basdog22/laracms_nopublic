<?php

class Installer{

    protected $hash;



    public  function doInstall($hash,$message){
        $config = require("/../app/config/cms.php");
        extract($config);
        $this->hash = $config['installation_hash'];
        if(trim($hash) && $this->hash == $hash){
            $this->createDb($message[4]);
            Artisan::call('migrate', array('--force' => true));
            $this->populateDb();
            return Redirect::to('/')->withMessage('LaraCMS Installed!');
        }else{
           return View::make('installation/install')->withMessage('The hash you provided is wrong. Please check your configuration and try again');
        }
    }

    private function populateDb(){
        $config = require("/../app/config/cms.php");
        extract($config);
        //addons
        //laracms
        $addon = new Addons;
        $addon->addon_name = 'laracms';
        $addon->addon_title = 'Core System Addon';
        $addon->icon_image = 'http://laravel.com/assets/img/logo-head.png';
        $addon->version = '1.0.1';
        $addon->author = 'bonweb';
        $addon->url = 'http://www.bonweb.gr';
        $addon->installed = 1;
        $addon->save();
        ClassLoader::addDirectories(array(
            public_path() . "/addons/laracms/controllers",
            public_path() . "/addons/laracms/models",
            public_path() . "/addons/laracms/helpers",
        ));
        //add the screensaver setting
        $setting = new Settings;
        $setting->area = 'backend';
        $setting->section = 'laracms';
        $setting->setting_name = 'screensaver';
        $setting->setting_value = '60000';
        $setting->autoload = 1;
        $setting->save();
        //grid manager
        $addon = new Addons;
        $addon->addon_name = 'grid_manager';
        $addon->addon_title = 'Grid Manager';
        $addon->icon_image = 'http://laravel.com/assets/img/logo-head.png';
        $addon->version = '1.0.1';
        $addon->author = 'bonweb';
        $addon->url = 'http://www.bonweb.gr';
        $addon->installed = 1;
        $addon->save();
        ClassLoader::addDirectories(array(
            public_path() . "/addons/grid_manager/controllers",
            public_path() . "/addons/grid_manager/models",
            public_path() . "/addons/grid_manager/helpers",
        ));
        require_once public_path() . "/addons/grid_manager/func.php";
        Event::fire('backend.addons.saveaddoninfo.grid_manager',array($addon));
        //themes
        $theme = new Themes;
        $theme->theme_name = 'lara';
        $theme->theme_title = 'LaraCMS Default Theme';
        $theme->icon_image = 'http://laravel.com/assets/img/logo-head.png';
        $theme->version = '1.0.1';
        $theme->author = 'bonweb';
        $theme->url = 'http://www.bonweb.gr';
        $theme->installed = 1;
        $theme->active = 1;
        $theme->save();
        //users


        $user = new User;
        $user->firstname = 'John';
        $user->lastname = 'Doe';
        $user->email = $config['admin_email'];
        $pass = Commoner::generatePass('administrator',$config['admin_email']);
        $user->password = Hash::make($pass);
        $user->save();

        $config['pass'] = $pass;
        //send the login credentials to the email
        Mail::send('emails.admin_credentials', $config, function($message) use ($user)
        {
            $message->to($user->email, $user->name)->subject('The credentials for your site at '.$_SERVER['SERVER_NAME']);
        });

	    //add the languages
	    $lang = new Languages;
	    $lang->code = 'en_US';
	    $lang->title = 'English';
	    $lang->image = "/uploads/flags/Englang.png";
	    $lang->active = 1;
	    $lang->save();
	    $lang = new Languages;
	    $lang->code = 'el_GR';
	    $lang->title = 'Greek';
	    $lang->image = "/uploads/flags/Greece.png";
	    $lang->active = 1;
	    $lang->save();
    }

    private function createDb($database){
        define('STDIN',fopen("php://stdin","r"));
        $config = require("/../app/config/database.php");

        extract($config['connections'][$config['default']]);

        $connection = new PDO("{$driver}:host={$host}", $username, $password);

        $connection->query("DROP DATABASE IF EXISTS ".$database);
        $connection->query("CREATE DATABASE ".$database);

    }
}