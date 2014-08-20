<?php

Event::listen('laracms.collect.content.types', function () {
    return array(
        array(
            'type' => 'pages', //the content type
            'title' => Lang::get('laracms::strings.pages'), //the title to display
            'slug' => 'page', //the slug that will be prepend on the item slug. eg: /page/about-us
            'model' => 'Pages' //the model to pull items from
        ),

    );
}, 1);

Event::listen('backend.widgets.create', function () {
    return array(
        'laracms/extends/backend/widgets'
    );
}, 1);


Event::listen('backend.sidebar.create', function () {
    return array(
        'laracms/extends/backend/sidebarmenu'
    );
}, 1);

Event::listen('backend.navbar.create', function () {
    return array(
        'laracms/extends/backend/tools'
    );
}, 1);

Event::listen('backend.footer.create', function () {
    return array(
        'laracms/extends/backend/footer'
    );
}, 1);

Event::listen('backend.header.create', function () {
    return array(
        'laracms/extends/backend/header'
    );
}, 1);

Event::listen('laracms.pages.all', function ($params) {
    return Pages::all();
}, 1);


Event::listen('laracms.main.content', function ($params) {
    return Config::get('cms.controller.content');
}, 1);

Event::listen('laracms.pages.last', function ($params) {
    return Pages::orderby('created_at', 'desc')->first();
}, 1);

Event::listen('laracms.menus.specific', function ($params) {
    $specific = Cache::remember('laracms_specific_menu_'.$params['menuid'], 60, function () use($params){
        $menu = Menus::find($params['menuid']);
        $it = $menu->menuitems;
        $items = array();
        $content = Event::fire('laracms.collect.content.types');

        foreach ($it as $k => $ti) {
            $items[$k] = $ti;
            $subs = array();
            if ($ti->model != '') {
                $model = $ti->model;
                foreach ($content as $ptype) {
                    foreach ($ptype as $ctype) {

                        if ($model == $ctype['model']) {
                            $slug = $ctype['slug'];
                        }
                    }
                }
                $subitems = $model::all();
                foreach ($subitems as $subitem) {
                    $subitem->slug = $slug ."/". $subitem->slug;
                    $subs[] = $subitem;
                }
                $items[$k]->subs = $subs;
            }

        }

        return array(
            'menu' => $menu,
            'items' => $items
        );
    });
    return $specific;
}, 1);


Event::listen('content.blocks.collect', function () {
    $blocks = Config::get('cms.contentblocks');
    $blocks = (is_array($blocks)) ? $blocks : array();
    $blocks = array_merge($blocks, array(
        'larapages' => array(
            'block_title' => Lang::get('laracms::strings.pages'),
            'events_to_fire' => array(
                'laracms.pages.all' => Lang::get('laracms::strings.all_pages'),
                'laracms.pages.last' => Lang::get('laracms::strings.last_page')
            ),
            'views_path' => array(
                'laracms/views/pages/blocks/links' => Lang::get('laracms::strings.show_as_links'),
                'laracms/views/pages/blocks/full' => Lang::get('laracms::strings.show_full_page')
            ),
        ),
        'maincontroller' => array(
            'block_title' => Lang::get('laracms::strings.main_content'),
            'events_to_fire' => array(
                'laracms.main.content' => Lang::get('laracms::strings.load_main_content'),
            ),
            'views_path' => array(
                'laracms/views/main/maincontent' => Lang::get('strings.default')
            ),
        ),
        'laramenus' => array(
            'block_title' => Lang::get('laracms::strings.menus'),
            'params' => array(
                array(
                    'type' => 'select',
                    'name' => 'menuid',
                    'label' => Lang::get('strings.please_select'),
                    'options' => Menus::getForSelect()
                ),
            ),
            'events_to_fire' => array(
                'laracms.menus.specific' => Lang::get('laracms::strings.specific_menu'),
            ),
            'views_path' => array(
                'laracms/views/menus/blocks/specific' => Lang::get('strings.default')
            ),
        )
    ));
    Config::set('cms.contentblocks', $blocks);
}, 1);

function feedToList($items){
    ob_start();
    ?>
    <ul class="nav nav-stacked">
        <?php foreach($items as $item):?>
            <li class="clearfix"><a target="_blank" href="<?php echo $item->get_permalink() ?>"><?php echo $item->get_title()?></a></li>
        <?php endforeach?>
    </ul>
    <?php
    return ob_get_clean();
}

function pagesToList($pages){
    ob_start();
    ?>
    <ul class="nav nav-stacked">
        <?php foreach($pages as $item):?>
            <li class="clearfix"><a href="<?php echo url('backend/editpage')."/". $item->id ?>"><?php echo $item->title?></a></li>
        <?php endforeach?>
    </ul>
    <?php
    return ob_get_clean();
}