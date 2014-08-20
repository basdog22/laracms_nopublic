<?php

class LanguagesController extends BaseController{
    protected $layout = 'layouts.backend.devoops';
    protected $area = 'backend';

    function manage(){

        $languages = Languages::paginate(Config::get('cms.auto_settings.backend.laracms.paging'));

        Event::fire('backend.languages.manage', array($languages));

        $this->layout->content = View::make('backend/languages')->with('langs',$languages);
    }

    function addlang(){
        $lang = new Languages;
        $lang->code = Input::get('code');
        $lang->title = Input::get('title');
        $lang->image = Input::get('image_url');
        $lang->save();
        return Redirect::to("languages/manage")->withMessage($this->notifyView(Lang::get('messages.lang_created'),'success'));
    }

    function newlang(){
        if (Request::ajax()){
            return View::make('backend/newlang');
        }else{
            $this->layout->content = View::make('backend/newlang');
        }

    }

    function setcurrent($langid){
        $lang = Languages::find($langid);
        Session::put('currlang',array(
            'code'  =>  $lang->code,
            'title' =>  $lang->title,
            'image' =>  $lang->image
        ));
        return Redirect::back()->withMessage($this->notifyView(Lang::get('messages.lang_is_current',array('name'=>$lang->title)),'success'));
    }

    function dellang($langid){
        $lang = Languages::find($langid);
        $lang->delete();
        return Redirect::to("languages/manage")->withMessage($this->notifyView(Lang::get('messages.lang_deleted'),'success'));
    }
}