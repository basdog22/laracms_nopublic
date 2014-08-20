<?php

class BaseController extends Controller
{

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */

    protected $addonlinks;


    protected function setupLayout()
    {

        if (!is_null($this->layout)) {
            if ($this->area == 'backend' || $this->area == 'common') {
                $this->layout = View::make($this->layout);
            } elseif ($this->area == 'frontend') {
                $this->layout = View::make('frontend.' . Config::get('cms.theme') . '.layout');
            }

        }


        $addons = Config::get('cms.addons.installed');

        $this->addonlinks = View::make('laracms/extends/backend/addonlinks-dummy');
        foreach ($addons as $k => $v) {
            if ($this->area == 'backend') {
                if (View::exists($v . '/extends/' . $this->area . '/addonlinks') && $v != 'laracms') {
                    $this->addonlinks .= View::make($v . '/extends/' . $this->area . '/addonlinks');
                }

            }
        }
        if ($this->area == 'backend') {
            Config::set('cms.addonlinks', $this->addonlinks);
            $widgets = Event::fire('backend.widgets.create');

            foreach ($widgets as $w) {
                foreach ($w as $o) {
                    $this->layout->widgets .= View::make($o);
                }
            }

            $sidebarmenu = Event::fire('backend.sidebar.create');

            foreach ($sidebarmenu as $w) {
                foreach ($w as $o) {
                    $this->layout->sidebarmenu .= View::make($o);
                }
            }

            $navtools = Event::fire('backend.navbar.create');

            foreach ($navtools as $w) {
                foreach ($w as $o) {
                    $this->layout->navtools .= View::make($o);
                }
            }
            $footeritems = Event::fire('backend.footer.create');

            foreach ($footeritems as $w) {
                foreach ($w as $o) {
                    $this->layout->footeritems .= View::make($o);
                }
            }

            $headeritems = Event::fire('backend.header.create');

            foreach ($headeritems as $w) {
                foreach ($w as $o) {
                    $this->layout->headeritems .= View::make($o);
                }
            }

            //check if empty
            $this->layout->sidebarmenu = ($this->layout->sidebarmenu) ? $this->layout->sidebarmenu : '';
            $this->layout->widgets = ($this->layout->widgets) ? $this->layout->widgets : '';
            $this->layout->navtools = ($this->layout->navtools) ? $this->layout->navtools : '';
            $this->layout->footeritems = ($this->layout->footeritems) ? $this->layout->footeritems : '';
            $this->layout->headeritems = ($this->layout->headeritems) ? $this->layout->headeritems : '';

            $this->layout->sidebar = View::make('backend/sidebar')->with('sidebarmenu', $this->layout->sidebarmenu);
            $this->layout->navbar = View::make('backend/navbar')->with('navtools', $this->layout->navtools);
            $this->layout->footer = View::make('backend/footer')->with('footeritems', $this->layout->footeritems);
            $this->layout->header = View::make('backend/header')->with('headeritems', $this->layout->headeritems);
        } elseif ($this->area == 'frontend') {

        }


    }

    public function getContentTypesFlat(){
        $content = Event::fire('laracms.collect.content.types');
        $types = array();
        foreach($content as $k=>$v){
            foreach($v as $o){
//                Commoner::debug($o);
                $types[] = $o;
            }
        }
        return $types;
    }

    public function setLayoutContent($view_path,$data=array()){
        $view = View::make($view_path)->with($data);
//       Commoner::debug($view);
        Config::set('cms.controller.content',$view);
        $this->layout->content = $view;
    }

    public function notifyView($message, $type = 'success')
    {
        return MessagesHelper::message_format($message, $type);
    }

}
