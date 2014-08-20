<div class="row">
    <div id="breadcrumb" class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="{{ url('backend/dashboard') }}">{{ Lang::get('strings.dashboard') }}</a></li>
            <li><a href="{{ url('backend/settings') }}">{{ Lang::get('strings.settings') }}</a></li>

        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">

        <h2 class="form-signin-heading">{{ Lang::get('strings.settings') }}</h2>

        {{ Form::open(array('url'=>'backend/savesettings', 'class'=>'form-edituser')) }}
        {{ Form::hidden('section', 'laracms') }}
        {{ Form::label(Lang::get('laracms::strings.area')) }}
        {{ Form::select('area', array('frontend'=>Lang::get('laracms::strings.frontend'),'backend'=>Lang::get('laracms::strings.backend')),'backend',['class'=>'no-select2']) }}
        {{ Form::text('setting_name',null,['placeholder'=>Lang::get('laracms::strings.setting_name')]) }}
        {{ Form::text('setting_value',null,['placeholder'=>Lang::get('laracms::strings.setting_value')]) }}
        {{ Form::label(Lang::get('laracms::strings.autoload')) }}
        {{ Form::checkbox('autoload',1,0) }}
        {{ Form::submit(Lang::get('strings.save_settings'), array('class'=>'btn btn-large btn-primary'))}}
        {{ Form::close() }}
        <hr/>
        @foreach($settings as $setting)
        {{ Form::open(array('url'=>'backend/savesettings', 'class'=>'form-edituser')) }}
        {{ Form::hidden('id', $setting->id) }}
        {{ Form::hidden('section', 'laracms') }}
        {{ Form::label(Lang::get('laracms::strings.area')) }}
        {{ Form::select('area', array('frontend'=>Lang::get('laracms::strings.frontend'),'backend'=>Lang::get('laracms::strings.backend')),$setting->area,['class'=>'no-select2']) }}
        {{ Form::text('setting_name',$setting->setting_name,['placeholder'=>Lang::get('laracms::strings.setting_name')]) }}
        {{ Form::text('setting_value',$setting->setting_value,['placeholder'=>Lang::get('laracms::strings.setting_value')]) }}
        {{ Form::label(Lang::get('laracms::strings.autoload')) }}
        {{ Form::checkbox('autoload',1,$setting->autoload) }}
        {{ Form::submit(Lang::get('strings.save_settings'), array('class'=>'btn btn-large btn-primary'))}}
        {{ Form::close() }}

        @endforeach

    </div>
</div>
