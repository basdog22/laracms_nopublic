<?php

class Widget
{

    static function show($title, $data, $loadview = false)
    {

        ob_start();
        ?>
    <div id="<?php echo Widget::getid() ?>" class="col-md-4 ms31 box widget-box">
        <div class="box-header handle">
            <div class="box-name">
                <span><?php echo $title ?></span>
            </div>
            <div class="box-icons">
                <a class="move-activ" href="#"><i class="fa fa-arrows "></i></a>
            </div>
        </div>
        <div class="box-content scrollbars">
            <?php
            if ($loadview) {
                $data = View::make($loadview)->with($data);
            }
            echo $data
            ?>
        </div>
        </div><?php
        $result = ob_get_clean();
        return $result;
    }

    static function getid()
    {
        $widgets = Config::get('cms.widgets');
        $widgets['widget_' . count($widgets)] = 1;
        Config::set('cms.widgets', $widgets);
        return 'widget_' . count($widgets);
    }


}