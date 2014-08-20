<?php

class LaraController extends BaseController {

    protected $area = 'frontend';

    protected $layout = 'frontend.default.layout';
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showMainpage(){
        $this->setLayoutContent('laracms/views/lara');
	}


    function showpage($slug){
        $page = Pages::page($slug);
        if(is_null($page)){
            App::abort(404);
        }
        $this->setLayoutContent('laracms/views/pages/page',array('page'=>$page));
    }

}
