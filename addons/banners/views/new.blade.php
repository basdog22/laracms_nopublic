
<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        {{ Form::open(array('url'=>'backend/addbanner','files'=>true, 'class'=>'form-newmenu')) }}
        <h2 class="form-signin-heading">{{ Lang::get('banners::strings.new_banner') }}</h2>

        {{ Form::text('title', null, array('class'=>'form-control', 'placeholder'=>Lang::get('banners::strings.banner_title'))) }}
        {{ Form::text('url', null , array('class'=>'form-control', 'placeholder'=>Lang::get('banners::strings.banner_url'))) }}
        {{ Form::text('image_url', null , array('class'=>'form-control form-control-smaller', 'placeholder'=>Lang::get('banners::strings.image_url'))) }}
        <a href="{{ url('backend/imggallery') }}" class="popup-link" data-container="body" data-toggle="popover" data-placement="bottom" data-content=""><i class="fa fa-file-o"></i> </a>
        {{ Form::submit(Lang::get('banners::strings.add_banner'), array('class'=>'btn btn-large btn-primary'))}}
        {{ Form::close() }}
    </div>

</div>

