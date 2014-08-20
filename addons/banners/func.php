<?php

Event::listen('backend.widgets.create', function () {
    return array(
        'banners/extends/backend/widgets'
    );
}, 1);

Event::listen('backend.footer.create', function () {
    return array(
        'banners/extends/backend/footer'
    );
}, 1);

Event::listen('backend.header.create', function () {
    return array(
        'banners/extends/backend/header'
    );
}, 1);

Event::listen('laracms.collect.content.types', function () {
    return array(
        array(
            'type' => 'banners', //the content type
            'title' => Lang::get('banners::strings.banners'), //the title to display
            'slug' => 'banner', //the slug that will be prepend on the item slug. eg: /page/about-us
            'model' => 'Banners' //the model to pull items from
        ),

    );
}, 1);

Event::listen('banners.slider.banner', function ($params) {
    return Banners::cachedin($params['bannerid']);
}, 1);

Event::listen('content.blocks.collect', function () {
    $blocks = Config::get('cms.contentblocks');
    $blocks = (is_array($blocks)) ? $blocks : array();
    $blocks = array_merge($blocks, array(
        'banners' => array(
            'block_title' => Lang::get('banners::strings.banners'),
            'params' => array(
                array(
                    'type' => 'select',
                    'name' => 'bannerid',
                    'attr' => 'multiple',
                    'label' => Lang::get('strings.please_select'),
                    'options' => Banners::getForSelect()
                ),
            ),
            'events_to_fire' => array(
                'banners.slider.banner' => Lang::get('banners::strings.slider_banners')
            ),
            'views_path' => array(
                'banners/views/slider' => Lang::get('banners::strings.slider'),
                'banners/views/single' => Lang::get('banners::strings.single')
            ),
        )
    ));
    Config::set('cms.contentblocks', $blocks);
}, 1);



Event::listen('backend.addons.saveaddoninfo.banners', function ($addon) {

    Schema::create('banners', function($table)
    {
        $table->increments('id');
		$table->string('title');
		$table->string('url');
		$table->string('image_url');
        $table->timestamps();
		
    });

}, 1);

function bannersToList($banners){
        ob_start();
        ?>
        <ul class="nav nav-stacked">
            <?php foreach($banners as $item):?>
                <li class="clearfix"><a href="<?php echo url('backend/editbanner')."/". $item->id ?>"><?php echo $item->title?></a></li>
            <?php endforeach?>
        </ul>
        <?php
        return ob_get_clean();
}