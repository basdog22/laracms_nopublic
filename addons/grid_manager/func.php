<?php

Event::listen('backend.widgets.create', function () {
    return array(
        //'laramce/extends/backend/widgets'
    );
}, 1);

Event::listen('backend.footer.create', function () {
    return array(
        'grid_manager/extends/backend/footer'
    );
}, 1);

Event::listen('backend.header.create', function () {
    return array(
        'grid_manager/extends/backend/header'
    );
}, 1);

Event::listen('backend.addons.saveaddoninfo.grid_manager', function ($addon) {
    Schema::create('gridmanager', function($table)
    {
        $table->increments('id');
        $table->string('route','100')->index();
        $table->string('grid_name',100);
        $table->string('grid_title',100);
        $table->string('grid_description',160);
        $table->timestamps();

    });

    Schema::create('gridmanager_blocks', function($table)
    {
        $table->increments('id');
        $table->integer('grids_id');
        $table->string('block_position',250);
        $table->string('view_path',250);
        $table->string('block_title',250);
        $table->string('block_name',250);
        $table->string('event_to_fire',160);
        $table->text('params');
        $table->integer('sort');
        $table->timestamps();
    });

    $grid = new Grids;
    $grid->route = 'LaraController@showMainpage';
    $grid->grid_name = 'Default';
    $grid->grid_title = 'Default';
    $grid->grid_description = 'Default';
    $grid->save();

}, 1);