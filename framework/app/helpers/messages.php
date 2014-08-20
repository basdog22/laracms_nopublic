<?php

class MessagesHelper{
    public static function message_format($message,$type)
    {
        return '<div role="alert" class="alert alert-'.$type.' alert-dismissible ">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">'.Lang::get('strings.close').'</span></button>
        '.$message.'</div>';
    }
}