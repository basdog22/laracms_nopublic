{{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}
<h2 class="form-signin-heading">{{Lang::get('strings.login_please')}}</h2>

{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>Lang::get('strings.email_address'))) }}
{{ Form::password('pass', array('class'=>'form-control', 'placeholder'=>Lang::get('strings.password'))) }}

{{ Form::submit(Lang::get('strings.login'), array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}