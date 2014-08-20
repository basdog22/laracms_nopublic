<?php



Event::listen('backend.footer.create', function () {
    return array(
        'laramce/extends/backend/footer'
    );
}, 1);

Event::listen('backend.header.create', function () {
    return array(
        'laramce/extends/backend/header'
    );
}, 1);

Event::listen('backend.addons.saveaddoninfo.laramce', function ($addon) {
    $setting = new Settings;
    $setting->area = 'backend';
    $setting->section = 'laramce';
    $setting->setting_name = 'plugins';
    $setting->setting_value = 'example';
    $setting->autoload = 1;
    $setting->save();

}, 1);