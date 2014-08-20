
<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        {{ Form::open(array('url'=>'backend/saveseo', 'class'=>'form-newmenu')) }}
        <h2 class="form-signin-heading">{{ Lang::get('laracms::strings.edit_seo') }}</h2>
        {{ Form::hidden('seoid', $seo->id) }}
        {{ Form::text('title', $seo->title , array('class'=>'form-control', 'placeholder'=>Lang::get('laracms::strings.seo_title'))) }}
        {{ Form::textarea('description', $seo->description  , array('class'=>'form-control', 'placeholder'=>Lang::get('laracms::strings.seo_description'))) }}
        {{ Form::textarea('keywords', $seo->keywords  , array('class'=>'form-control', 'placeholder'=>Lang::get('laracms::strings.seo_keywords'))) }}

        {{ Form::submit(Lang::get('strings.save'), array('class'=>'btn btn-large btn-primary'))}}
        {{ Form::close() }}
    </div>

</div>
