<?php

class Commoner{

    static function debug(){
        static $count = 0;
        $args = func_get_args();

        if (!empty($args)) {
            echo '<ol style="font-family: Courier; font-size: 12px; border: 1px solid #dedede; background-color: #efefef; float: left; padding-right: 20px;">';
            foreach ($args as $k => $v) {
                $v = htmlspecialchars(print_r($v, true));
                if ($v == '') {
                    $v = '    ';
                }

                echo '<li><pre>' . $v . "\n" . '</pre></li>';
            }
            echo '</ol><div style="clear:left;"></div>';
        }
        $count++;
        exit;

    }

    static function print_r(){
        static $count = 0;
        $args = func_get_args();

        if (!empty($args)) {
            echo '<ol style="font-family: Courier; font-size: 12px; border: 1px solid #dedede; background-color: #efefef; float: left; padding-right: 20px;">';
            foreach ($args as $k => $v) {
                $v = htmlspecialchars(print_r($v, true));
                if ($v == '') {
                    $v = '    ';
                }

                echo '<li><pre>' . $v . "\n" . '</pre></li>';
            }
            echo '</ol><div style="clear:left;"></div>';
        }
        $count++;
    }


    static function generatePass($username,$email){
        $usersalt = md5($username.$email);
        $salt = "A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z";
        $saltlow = strtolower($salt);
        $saltnum = "0,1,2,3,4,5,6,7,8,9";
        $saltspecial = "!,@,#,%,^,&,*,(,)";
        $salt = $salt.",".$saltlow.",".$saltnum.",".$saltspecial;
        $salt = explode(",",$salt);
        shuffle($salt);
        $salt = implode("",$salt);
        $salt = substr($salt,1,8);
        $usalt = substr($usersalt,0,4);
        $salt = $salt.$usalt;
        return $salt;
    }

    static function informAdmin($error){

        $config = Config::get('cms');
        Mail::send('emails.error_reports', $error, function($message) use ($config)
        {
            $message->to($config['admin_email'], $config['title'])->subject('Error Report for '.$_SERVER['SERVER_NAME']);
        });
    }

    static function title(){
        $seo = Config::get('cms.seo');
        if(!is_null($seo)){
            return $seo->title;
        }
        return Config::get('cms.title');
    }

    static function description(){
        $seo = Config::get('cms.seo');
        if(!is_null($seo)){
            return $seo->description;
        }
        return Config::get('cms.description');
    }

    static function keywords(){
        $seo = Config::get('cms.seo');
        if(!is_null($seo)){
            return $seo->keywords;
        }
        return Config::get('cms.keywords');
    }

    static function observe(){
        App::missing(function($exception)
        {
            return View::make('common.errors.404', array(), 404);
        });

        App::error(function ($e, $code) {
            switch($code){
                case 403:
                    Commoner::informAdmin(array('text'=>$e->getMessage()));
                    return Response::view('common.errors.403', array(), 403);
                case 404:
                    return Response::view('common.errors.404', array(), 404);
                case 500:
                    $message = explode(' ', $e->getMessage());

                    $dbCode = rtrim($message[1], ']');
                    $dbCode = trim($dbCode, '[');
                    // codes specific to MySQL
                    switch ($dbCode){
                        case 1049:
                            //not installed or error in config
                            if(isset($_GET['hash'])){
                                $installer = new Installer;
                                return $installer->doInstall($_GET['hash'],$message);
                            }else{
                                return View::make('installation/install');
                            }
                            break;
                        case 2002:
                            Commoner::informAdmin(array('text'=>'Database server seems to be down'));
                            return View::make('installation/dbdown')->withMessage($message);
                            break;
                        default:
                            //no specific error...
                            if(Config::get('cms.laradebug')){
                                return;
                            }
                            Commoner::informAdmin(array('text'=>$e->getMessage()));
                            return View::make('installation/unknown')->withMessage($message);
                            break;
                    }
                    break;
            }




        }); // end of App::error
    }
}