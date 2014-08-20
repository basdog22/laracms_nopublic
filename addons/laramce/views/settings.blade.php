<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        {{ Form::open(array('url'=>'backend/laramcesave', 'class'=>'form-edituser')) }}
        <h2 class="form-signin-heading">{{ Lang::get('strings.settings') }}</h2>
        {{ Form::hidden('section', 'laramce') }}
        {{ Form::select('plugins[]', $plugins,$selplugins,['multiple'=>true]) }}
        {{ Form::submit(Lang::get('strings.save_settings'), array('class'=>'btn btn-large btn-primary'))}}
        {{ Form::close() }}
    </div>
</div>
