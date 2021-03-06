
<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        {{ Form::open(array('url'=>'languages/addlang', 'class'=>'form-newmenu')) }}
        <h2 class="form-signin-heading">{{ Lang::get('strings.new_lang') }}</h2>
        {{ Form::label(Lang::get('strings.lang_code')) }}
        {{ Form::text('code', null, array('class'=>'form-control', 'placeholder'=>Lang::get('strings.lang_code_example'))) }}
        {{ Form::label(Lang::get('strings.title')) }}
        {{ Form::text('title', null , array('class'=>'form-control', 'placeholder'=>Lang::get('strings.title'))) }}
        {{ Form::label(Lang::get('strings.image')) }}
        {{ Form::text('image_url', null , array('class'=>'form-control form-control-smaller', 'placeholder'=>Lang::get('strings.image'))) }}
        <a href="{{ url('backend/imggallery/flags') }}" class="popup-link" data-container="body" data-toggle="popover" data-placement="bottom" data-content=""><i class="fa fa-file-o"></i> </a>
        {{ Form::submit(Lang::get('strings.add_lang'), array('class'=>'btn btn-large btn-primary'))}}
        {{ Form::close() }}
    </div>

</div>

