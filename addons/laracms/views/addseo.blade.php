
<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        {{ Form::open(array('url'=>'backend/addseo', 'class'=>'form-newmenu')) }}
        <h2 class="form-signin-heading">{{ Lang::get('laracms::strings.add_seo') }}</h2>
        {{ Form::hidden('itemid', $item->id) }}
        {{ Form::hidden('model', $model) }}
        {{ Form::text('title', $item->title , array('class'=>'form-control', 'placeholder'=>Lang::get('laracms::strings.seo_title'))) }}
        {{ Form::textarea('description', $item->description  , array('class'=>'form-control', 'placeholder'=>Lang::get('laracms::strings.seo_description'))) }}
        {{ Form::textarea('keywords', $item->keywords  , array('class'=>'form-control', 'placeholder'=>Lang::get('laracms::strings.seo_keywords'))) }}

        {{ Form::submit(Lang::get('strings.save'), array('class'=>'btn btn-large btn-primary'))}}
        {{ Form::close() }}
    </div>

</div>
