<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function ($request) {
    Commoner::observe();
    //change the hash so no malware uses it
    Config::set('cms.installation_hash', '');
    $addonsNotInstalled = $addonsInstalled = $themesNotInstalled = $themesInstalled = array();
    $addons = Addons::all();
    $themes = Themes::all();
    foreach ($addons as $addon) {
        if ($addon->installed == 1) {
            ClassLoader::addDirectories(array(
                public_path() . "/addons/{$addon->addon_name}/controllers",
                public_path() . "/addons/{$addon->addon_name}/models",
                public_path() . "/addons/{$addon->addon_name}/helpers",
            ));
        }
    }
    foreach ($themes as $theme) {
        if ($theme->installed == 1) {
            $themesInstalled[] = $theme->theme_name;
            if ($theme->active == 1) {
                Config::set('cms.theme', $theme->theme_name);
                //include the functions file
                include_once public_path() . "/layouts/frontend/{$theme->theme_name}/func.php";
            }
        } else {
            $themesNotInstalled[] = $theme->theme_name;
        }

    }

    $settings = Settings::whereRaw("autoload=1")->get();
    $auto_settings = array();
    foreach ($settings as $setting) {
        $auto_settings[$setting->area][$setting->section][$setting->setting_name] = $setting->setting_value;
    }

    Config::set("cms.auto_settings", $auto_settings);
    Config::set("cms.themes.data", $themes);
    Config::set("cms.themes.installed", $themesInstalled);
    Config::set("cms.themes.not_installed", $themesNotInstalled);

    foreach ($addons as $addon) {
        if ($addon->installed == 1) {
            $addonsInstalled[] = $addon->addon_name;
            if (file_exists(public_path() . "/addons/{$addon->addon_name}/routes.php")) {
                require public_path() . "/addons/{$addon->addon_name}/routes.php";
            }
            if (file_exists(public_path() . "/addons/{$addon->addon_name}/func.php")) {
                require public_path() . "/addons/{$addon->addon_name}/func.php";
            }

            $namespace = $addon->addon_name;
            $path = public_path() . "/addons/{$addon->addon_name}/lang";
            Lang::addNamespace($namespace, $path);

        } else {
            $addonsNotInstalled[] = $addon->addon_name;
        }

    }

    Config::set("cms.addons.data", $addons);
    Config::set("cms.addons.installed", $addonsInstalled);
    Config::set("cms.addons.not_installed", $addonsNotInstalled);

    if(Session::has('currlang')){
        Config::set('cms.currlang',Session::get('currlang'));
    }else{
        $lang = Languages::where("code","=",Config::get('cms.currlang'))->first();
        Config::set('cms.currlang',array(
            'code'  =>  $lang->code,
            'title' =>  $lang->title,
            'image' =>  $lang->image
        ));
    }

});


App::after(function ($request, $response) {
    //


});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function () {

    if (Auth::guest()) {
        if (Request::ajax()) {
            return Response::make('Unauthorized', 401);
        } else {
            return Redirect::guest('users/login')->with(
                'message', Lang::get('messages.login_required')
            );
        }
    }
});


Route::filter('auth.basic', function () {
    return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function () {
    if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function () {
    if (Session::token() != Input::get('_token')) {
        throw new Illuminate\Session\TokenMismatchException;
    }
});


