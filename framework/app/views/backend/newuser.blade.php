
<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        {{ Form::open(array('url'=>'users/adduser', 'class'=>'form-newmenu')) }}
        <h2 class="form-signin-heading">{{ Lang::get('strings.new_user') }}</h2>
        {{ Form::label(Lang::get('strings.firstname')) }}
        {{ Form::text('firstname', null, array('class'=>'form-control', 'placeholder'=>Lang::get('strings.firstname'))) }}
        {{ Form::label(Lang::get('strings.lastname')) }}
        {{ Form::text('lastname', null , array('class'=>'form-control', 'placeholder'=>Lang::get('strings.lastname'))) }}
        {{ Form::label(Lang::get('strings.email')) }}
        {{ Form::email('email', null , array('class'=>'form-control', 'placeholder'=>Lang::get('strings.email'))) }}
        {{ Form::label(Lang::get('strings.password')) }}
        {{ Form::password('password', null , array('class'=>'form-control', 'placeholder'=>Lang::get('strings.password'))) }}

        {{ Form::submit(Lang::get('strings.add_user'), array('class'=>'btn btn-large btn-primary'))}}
        {{ Form::close() }}
    </div>

</div>

