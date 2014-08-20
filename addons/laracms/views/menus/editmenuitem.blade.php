
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            {{ Form::open(array('url'=>'backend/savemenuitem', 'class'=>'form-newmenu')) }}
            <h2 class="form-signin-heading">{{ Lang::get('laracms::strings.edit_menuitem') }}</h2>

            {{ Form::hidden('menuitemid', $menuitem->id) }}
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
            {{ Form::text('url', $menuitem->url, array('class'=>'form-control form-control-smaller', 'placeholder'=>Lang::get('laracms::strings.url'))) }}
            <a href="{{ url('backend/contenttype') }}" class="popup-link" data-container="body" data-toggle="popover" data-placement="left" data-content=""><i class="fa fa-file-o"></i> </a>
            {{ Form::text('link_text', $menuitem->link_text , array('class'=>'form-control', 'placeholder'=>Lang::get('laracms::strings.link_text'))) }}
            {{ Form::label(Lang::get('laracms::strings.link_target')) }}
            {{ Form::select('link_target', array('_self'=>Lang::get('laracms::strings.same_window'),'_blank'=>Lang::get('laracms::strings.new_window')),$menuitem->link_target) }}
            {{ Form::textarea('link_attr', $menuitem->link_attr, array('class'=>'form-control', 'placeholder'=>Lang::get('laracms::strings.link_attr'))) }}
            {{ Form::text('link_css', $menuitem->link_css, array('class'=>'form-control', 'placeholder'=>Lang::get('laracms::strings.link_css'))) }}
            {{ Form::text('link_class', $menuitem->link_class, array('class'=>'form-control', 'placeholder'=>Lang::get('laracms::strings.link_class'))) }}


            {{ Form::submit(Lang::get('laracms::strings.save_menuitem'), array('class'=>'btn btn-large btn-primary'))}}
            {{ Form::close() }}
        </div>

    </div>

