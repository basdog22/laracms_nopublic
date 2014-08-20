<?php

class LaramceController extends BaseController{
    protected $layout = 'layouts.backend.devoops';
    protected $area = 'backend';

    public function settings(){
        $sel = Settings::whereRaw("section='laramce' AND setting_name='plugins'")->first();

        $sel = explode(" ",$sel->setting_value);
        foreach($sel as $v){
            $selplugins[$v] = $v;
        }

        $plugins = $this->scanPlugins();

        $this->layout->content = View::make('laramce/views/settings')->with('plugins',$plugins)->with('selplugins',$selplugins);
    }

    private function scanPlugins(){
       $plugins = scandir(public_path()."/addons/laramce/tinymce/plugins/");
       $plugs = array();
        unset($plugins[0]);
        unset($plugins[1]);
        foreach($plugins as $k=>$v){
            $plugs[$v] = $v;
        }
        return $plugs;
    }

    public function save(){

        $settings = Settings::whereRaw("section='laramce' AND setting_name='plugins'")->first();
        if(!$settings->id){
            $settings = new Settings;
        }
        $settings->area = 'backend';
        $settings->section = 'laramce';
        $settings->setting_name = 'plugins';
        $settings->setting_value = implode(" ",Input::get('plugins'));
        $settings->autoload = 1;
        $settings->save();
        return Redirect::to('backend/laramce')->withMessage($this->notifyView(Lang::get('messages.settings_saved'),'success'));
    }
}