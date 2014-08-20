
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            {{ Form::open(array('url'=>'backend/addmenuitem', 'class'=>'form-newmenu')) }}
            <h2 class="form-signin-heading">{{ Lang::get('laracms::strings.new_menuitem') }}</h2>

            {{ Form::label(Lang::get('laracms::strings.for_menu')) }}
            {{ Form::select('menuid', $menus) }}
            {{ Form::label(Lang::get('laracms::strings.submenu_from')) }}
            <select name="model" class="">
                <option selected value="0">{{ Lang::get('strings.please_select') }}</option>
                @foreach($content as $sub)
                @foreach($sub as $type)
                <option value="{{ $type['model'] }}">{{ $type['title'] }}</option>
                @endforeach
                @endforeach
            </select>
            {{ Form::text('url', null, array('class'=>'form-control form-control-smaller', 'placeholder'=>Lang::get('laracms::strings.url'))) }}
            <a href="{{ url('backend/contenttype') }}" class="popup-link" data-container="body" data-toggle="popover" data-placement="left" data-content=""><i class="fa fa-file-o"></i> </a>
            {{ Form::text('link_text', null , array('class'=>'form-control', 'placeholder'=>Lang::get('laracms::strings.link_text'))) }}
            {{ Form::label(Lang::get('laracms::strings.link_target')) }}
            {{ Form::select('link_target', array('_self'=>Lang::get('laracms::strings.same_window'),'_blank'=>Lang::get('laracms::strings.new_window')),'_self') }}
            {{ Form::textarea('link_attr', null, array('class'=>'form-control', 'placeholder'=>Lang::get('laracms::strings.link_attr'))) }}
            {{ Form::text('link_css', null, array('class'=>'form-control', 'placeholder'=>Lang::get('laracms::strings.link_css'))) }}
            {{ Form::text('link_class', null, array('class'=>'form-control', 'placeholder'=>Lang::get('laracms::strings.link_class'))) }}


            {{ Form::submit(Lang::get('laracms::strings.add_menu'), array('class'=>'btn btn-large btn-primary'))}}
            {{ Form::close() }}
        </div>

    </div>

