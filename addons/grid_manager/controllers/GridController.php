<?php

class GridController extends BaseController{
    protected $layout = 'layouts.backend.devoops';
    protected $area = 'backend';


    public function manage(){
        $grid = Grids::all();
        $positions = Block::getReservedPositions();
        $this->layout->content = View::make('grid_manager/views/gridmanager')->with('grids',$grid)->with('positions',$positions);

    }

    public function addgrid(){
        $routes = $this->getRoutes();
        if(Request::ajax()){
            return View::make('grid_manager/views/addgrid')->with('routes',$routes);
        }else{
            $this->layout->content = View::make('grid_manager/views/addgrid')->with('routes',$routes);
        }
    }

    public function addblock($gridid){
        $gridid = explode("-",$gridid);
        $contentBlocks = Block::getContentBlocks();
//
        if(Request::ajax()){
            return View::make('grid_manager/views/addblock')->with('blocks',$contentBlocks)->with('gridid',$gridid);
        }else{
            $this->layout->content = View::make('grid_manager/views/addblock')->with('blocks',$contentBlocks)->with('gridid',$gridid);
        }
    }

    public function doaddblock(){
        $contentBlocks = Block::getContentBlocks();
        $contentBlock = $contentBlocks[Input::get('block_title')];
        $ev = array_keys($contentBlock['events_to_fire']);
        $vp = array_keys($contentBlock['views_path']);
        $block = new Blocks;
        $block->grids_id = Input::get('gridid');
        $block->block_position = Input::get('block_position');
        $block->block_title = $contentBlock['block_title'];
        $block->block_name = Input::get('block_title');
        $block->event_to_fire = reset($ev);
        $block->view_path = reset($vp);
        $block->sort = 0;

        $block->save();
        return Redirect::to('backend/gridmanager/')->withMessage($this->notifyView(Lang::get('grid_manager::messages.block_added'),'success'));
    }

    public function delblock($blockid){
        $block = Blocks::find($blockid);
        $block->delete();
        return Redirect::to('backend/gridmanager/')->withMessage($this->notifyView(Lang::get('grid_manager::messages.block_deleted'),'success'));
    }

    public function editblock($blockid){
        $block = Blocks::find($blockid);
        $contentBlocks = Block::getContentBlocks();
        $contentBlock = $contentBlocks[$block->block_name];

        $params = unserialize($block->params);
        $params = (is_array($params))?$params:array();
        if(Request::ajax()){
            return View::make('grid_manager/views/editblock')->with('block',$block)->with('contentblock',$contentBlock)->with('params',$params);
        }else{
            $this->layout->content = View::make('grid_manager/views/editblock')->with('block',$block)->with('contentblock',$contentBlock)->with('params',$params);
        }
    }

    public function doeditblock(){
        $block = Blocks::find(Input::get('blockid'));
        $contentBlocks = Block::getContentBlocks();
        $contentBlock = $contentBlocks[$block->block_name];
        $block->event_to_fire = Input::get('event_to_fire');
        $block->view_path = Input::get('view_path');
        $block->params = $this->getParams($contentBlock,Input::get());
        $block->save();
        return Redirect::to('backend/gridmanager/')->withMessage($this->notifyView(Lang::get('grid_manager::messages.block_saved'),'success'));
    }

    public function domoveblock(){
        $blockid = Input::get('block');
        $gridid = Input::get('grid');
        $block = Blocks::find($blockid);
        $block->block_position = $gridid;
        $block->save();
        return Response::json(array('type' => 'success', 'text' => Lang::get('grid_manager::messages.block_position_changed')));
    }

    function getParams($skeleton,$post){
        $params = array();
        if(isset($skeleton['params'])){
            foreach($skeleton['params'] as $k=>$v){
                if($post[$v['name']]){
                    $params[$v['name']] = $post[$v['name']];
                }
            }
        }

        return serialize($params);
    }

    public function editgrid($gridid){
        $routes = $this->getRoutes();
        $grid = Grids::find($gridid);
        if(Request::ajax()){
            return View::make('grid_manager/views/editgrid')->with('routes',$routes)->with('grid',$grid);
        }else{
            $this->layout->content = View::make('grid_manager/views/editgrid')->with('routes',$routes)->with('grid',$grid);
        }
    }
    public function savegrid(){
        if(Input::get('id')){
            $grid = Grids::find(Input::get('id'));
        }else{
            $grid = new Grids;
        }

        $grid->route = Input::get('route');
        $grid->grid_name = Input::get('grid_name');
        $grid->grid_title = Input::get('grid_title');
        $grid->grid_description = Input::get('grid_description');

        $grid->save();

        return Redirect::to('backend/gridmanager/')->withMessage($this->notifyView(Lang::get('grid_manager::messages.grid_created'),'success'));
    }

    public function delgrid($gridid){
        $grid = Grids::find($gridid);
        $grid->delete();
        return Redirect::to('backend/gridmanager/')->withMessage($this->notifyView(Lang::get('grid_manager::messages.grid_deleted'),'success'));
    }



    private function getRoutes(){
        $routeCollection = Route::getRoutes();
        $availRoutes = array();
        foreach($routeCollection as $route){
            if($route->getName()!='backend' && $route->getMethods()[0]=='GET' && !preg_match("#UploadsController#",$route->getActionName()) && !preg_match("#missingMethod#",$route->getActionName())){
                $availRoutes[$route->getActionName()] = $route->getActionName();
            }
        }
        return @$availRoutes;
    }

}