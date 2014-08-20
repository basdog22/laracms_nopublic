
<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        {{ Form::open(array('url'=>'backend/savebanner','files'=>true, 'class'=>'form-newmenu')) }}
        <h2 class="form-signin-heading">{{ Lang::get('banners::strings.edit_banner') }}</h2>
        {{ Form::hidden('bannerid', $banner->id) }}
        {{ Form::text('title', $banner->title, array('class'=>'form-control', 'placeholder'=>Lang::get('banners::strings.banner_title'))) }}
        {{ Form::text('url', $banner->url , array('class'=>'form-control', 'placeholder'=>Lang::get('banners::strings.banner_url'))) }}
        {{ Form::text('image_url', $banner->image_url , array('class'=>'form-control form-control-smaller', 'placeholder'=>Lang::get('banners::strings.image_url'))) }}
        <a href="{{ url('backend/imggallery') }}" class="popup-link" data-container="body" data-toggle="popover" data-placement="bottom" data-content=""><i class="fa fa-file-o"></i> </a>
        {{ Form::submit(Lang::get('banners::strings.save_banner'), array('class'=>'btn btn-large btn-primary'))}}
        {{ Form::close() }}
    </div>

</div>

