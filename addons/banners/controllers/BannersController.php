<?php

class BannersController extends BaseController{
    protected $layout = 'layouts.backend.devoops';
    protected $area = 'backend';



    public function manage(){
        $banners = Banners::paginate(Config::get('cms.auto_settings.backend.laracms.paging'));
        $this->layout->content = View::make("banners/views/manage")->with('banners',$banners);
    }

    public function newbanner(){

        if (Request::ajax()){
            return View::make('banners/views/new');
        }else{
            $this->layout->content = View::make('banners/views/new');
        }
    }

    public function addbanner(){
        $banner = new Banners;
        $banner->title = Input::get('title');
        $banner->url = Input::get('url');
        $banner->image_url = Input::get('image_url');
        $banner->save();
        return Redirect::to('backend/banners')->withMessage($this->notifyView(Lang::get('banners::messages.banner_created'),'success'));
    }

    public function delbanner($bannerid){
        $banner = Banners::find($bannerid);
        $banner->delete();
        return Redirect::to('backend/banners')->withMessage($this->notifyView(Lang::get('banners::messages.banner_deleted'),'success'));
    }

    public function editbanner($bannerid){
        $banner = Banners::find($bannerid);
        if (Request::ajax()){
            return View::make('banners/views/edit')->with('banner',$banner);
        }else{
            $this->layout->content = View::make('banners/views/edit')->with('banner',$banner);
        }
    }

    public function savebanner(){
        $banner = Banners::find(Input::get('bannerid'));
        $banner->title = Input::get('title');
        $banner->url = Input::get('url');
        $banner->image_url = Input::get('image_url');
        $banner->save();
        return Redirect::to('backend/banners')->withMessage($this->notifyView(Lang::get('banners::messages.banner_saved'),'success'));
    }
}