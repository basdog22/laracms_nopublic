<?php

class ThemesController extends BaseController{
    protected $layout = 'layouts.backend.devoops';
    protected $area = 'backend';

    function manage(){

        $themes = Config::get('cms.themes.data');
        Event::fire('backend.themes.manage', array($themes));
        $this->layout->content = View::make('backend/themes')->with('themes',$themes);
    }

    function uninstall($themeid){
        if($themeid>2){

            $theme = Themes::find($themeid);
            Event::fire('backend.themes.uninstall', array($theme));
            if($theme->active){
                $default = Themes::find(1);
                $default->active = 1;
                $default->save();
            }
            $theme->installed = 0;
            $theme->active = 0;
            $theme->save();
            return Redirect::to('themes/manage')->withMessage($this->notifyView(Lang::get('messages.theme_uninstalled')));
        }else{
            return Redirect::to('themes/manage')->withMessage($this->notifyView(Lang::get('messages.no_access'),'error'));
        }

    }

    function install($themeid){
        if($themeid>2){
            $theme = Themes::find($themeid);
            Event::fire('backend.themes.install', array($theme));
            $theme->installed = 1;
            $theme->save();
            return Redirect::to('themes/manage')->withMessage($this->notifyView(Lang::get('messages.theme_installed')));
        }else{
            return Redirect::to('themes/manage')->withMessage($this->notifyView(Lang::get('messages.no_access'),'error'));
        }

    }

    function activate($themeid){
        $theme = Themes::find($themeid);
        if($theme->active){
            return Redirect::to('themes/manage')->withMessage($this->notifyView(Lang::get('messages.no_change'),'warning'));
        }else{
            $themes = Themes::all();
            foreach($themes as $atheme){
                if($atheme->id!=$theme->id){
                    $atheme->active = 0;
                    $atheme->save();
                }else{
                    Event::fire('backend.themes.activate', array($atheme));
                    $atheme->active = 1;
                    $atheme->save();
                }
            }
        }
        return Redirect::to('themes/manage')->withMessage($this->notifyView(Lang::get('messages.theme_activated')));
    }

    function newtheme(){
        if (Request::ajax()){
            return View::make('backend/newtheme');
        }else{
            $this->layout->content = View::make('backend/newtheme');
        }

    }
}