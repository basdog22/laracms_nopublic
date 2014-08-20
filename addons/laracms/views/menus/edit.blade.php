
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            {{ Form::open(array('url'=>'backend/savemenu', 'class'=>'form-newmenu')) }}
            <h2 class="form-signin-heading">{{ Lang::get('laracms::strings.edit_menu') }}</h2>
            {{ Form::hidden('menuid', $menu->id) }}
            {{ Form::text('menu_title', $menu->menu_title , array('class'=>'form-control', 'placeholder'=>Lang::get('laracms::strings.menu_title'))) }}
            {{ Form::text('menu_name', $menu->menu_name  , array('class'=>'form-control', 'placeholder'=>Lang::get('laracms::strings.menu_name'))) }}

            {{ Form::submit(Lang::get('laracms::strings.save_menu'), array('class'=>'btn btn-large btn-primary'))}}
            {{ Form::close() }}
        </div>

    </div>

