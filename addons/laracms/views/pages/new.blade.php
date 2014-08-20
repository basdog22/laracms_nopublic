<div class="row">
    <div id="breadcrumb" class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="{{ url('backend/dashboard') }}">{{ Lang::get('strings.dashboard') }}</a></li>
            <li><a href="{{ url('backend/pages') }}">{{ Lang::get('laracms::strings.pages') }}</a></li>
            @if(isset($page))
            <li><a href="{{ url('backend/editpage/'.$page->id) }}">{{ Lang::get('strings.edit') }}</a></li>
            @else
            <li><a href="{{ url('backend/newpage') }}">{{ Lang::get('laracms::strings.new_page') }}</a></li>
            @endif
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <h2 class="form-signin-heading">{{ Lang::get('laracms::strings.pages') }}</h2>
        <ul class="nav nav-stacked">
            @foreach ($pages as $pag)
            <li>
                <a href="{{ url('backend/editpage/'.$pag->id) }}">{{ $pag->title }}</a>
            </li>
            @endforeach
        </ul>
        {{ $pages->links() }}
    </div>
    <div class="col-md-10">
        {{ Form::open(array('url'=>'backend/savepage', 'class'=>'form-newpage')) }}
        <h2 class="form-signin-heading">{{ Lang::get('laracms::strings.new_page') }}</h2>
        @if(isset($page))
        {{ Form::hidden('pageid', $page->id) }}
        {{ Form::label(Lang::get('strings.slug')) }}
        {{ Form::text('page_slug', $page->slug, array('class'=>'form-control', 'placeholder'=>Lang::get('strings.slug'))) }}
        {{ Form::label(Lang::get('strings.title')) }}
        {{ Form::text('title', $page->title, array('class'=>'form-control', 'placeholder'=>Lang::get('strings.title'))) }}
        {{ Form::label(Lang::get('laracms::strings.subtitle')) }}
        {{ Form::text('subtitle', $page->subtitle , array('class'=>'form-control', 'placeholder'=>Lang::get('laracms::strings.subtitle'))) }}
        {{ Form::label(Lang::get('laracms::strings.content')) }}
        {{ Form::textarea('content', $page->content , array('class'=>'form-control rte','id'=>'page-content', 'placeholder'=>Lang::get('laracms::strings.content'))) }}
        {{ Form::label(Lang::get('strings.status')) }}
        {{ Form::checkbox('status', 1,$page->status) }}
        <div class="clearfix"></div>
        {{ Form::submit(Lang::get('laracms::strings.save_page'), array('class'=>'btn btn-large btn-primary'))}}
        {{ Form::submit(Lang::get('laracms::strings.save_page_close'), array('class'=>'btn btn-large btn-primary','name'=>'saveclose'))}}
        @else
        {{ Form::label(Lang::get('strings.slug')) }}
        {{ Form::text('page_slug', null, array('class'=>'form-control', 'placeholder'=>Lang::get('strings.slug'))) }}
        {{ Form::label(Lang::get('strings.title')) }}
        {{ Form::text('title', null, array('class'=>'form-control', 'placeholder'=>Lang::get('strings.title'))) }}
        {{ Form::label(Lang::get('laracms::strings.subtitle')) }}
        {{ Form::text('subtitle', null , array('class'=>'form-control', 'placeholder'=>Lang::get('laracms::strings.subtitle'))) }}
        {{ Form::label(Lang::get('laracms::strings.content')) }}
        {{ Form::textarea('content', null , array('class'=>'form-control rte','id'=>'page-content', 'placeholder'=>Lang::get('laracms::strings.content'))) }}
        {{ Form::label(Lang::get('strings.status')) }}
        {{ Form::checkbox('status',  1, true) }}
        <div class="clearfix"></div>
        {{ Form::submit(Lang::get('laracms::strings.add_page'), array('class'=>'btn btn-large btn-primary'))}}
        {{ Form::submit(Lang::get('laracms::strings.add_page_close'), array('class'=>'btn btn-large btn-primary','name'=>'saveclose'))}}
        @endif

        {{ Form::close() }}
    </div>

</div>
