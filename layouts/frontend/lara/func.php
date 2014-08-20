<?php
Block::openRow('top_bar');
Block::reserve('top_extras_menu',array(
    'cols'  =>  4,
    'pull'=>  'right',
    'title' =>  'Top Links menu'
));
Block::openRow('menu_bar');
Block::reserve('mainmenu',array(
    'cols'  =>  12,
    'title' =>  'Main Menu Block'
));
Block::openRow('main_content');
Block::reserve('slider',array(
    'cols'  =>  12,
    'title' =>  'Row 1'
));
Block::reserve('widgets',array(
    'cols'  =>  12,
    'title' =>  'Row 2'
));
Block::reserve('boxes',array(
    'cols'  =>  12,
    'title' =>  'Row 3'
));
Block::reserve('call_to_action',array(
    'cols'  =>  12,
    'title' =>  'Row 4'
));

Block::openRow('footer');
Block::reserve('footer_boxes',array(
    'cols'  =>  12,
    'title' =>  'Footer'
));