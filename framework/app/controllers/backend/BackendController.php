<?php

class BackendController extends BaseController {

	protected $layout = 'layouts.backend.devoops';
    protected $area = 'backend';


    public function dashboard()
	{
        Event::fire('backend.dashboard.before_load');
        $this->layout->content = View::make('backend/backend')->with('widgets',$this->layout->widgets);
        Event::fire('backend.dashboard.after_load');
	}

    public function search(){
        $content = $this->getContentTypesFlat();

        $results = array();
        foreach($content as $type){
            $model = $type['model'];
            $results[$type['type']]['content'] = $type;
            $results[$type['type']]['data'] = $model::where("title",'LIKE',"%".Input::get('search')."%")->paginate(Config::get('cms.auto_settings.backend.laracms.paging'));
        }
//        Commoner::debug($results);
        $this->layout->content = View::make('backend/results')->withResults($results);
    }

    public function help(){
        if (Request::ajax()){
            return View::make('backend/help');
        }else{
            $this->layout->content = View::make('backend/help');
        }
    }

}
