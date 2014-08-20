
<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        {{ Form::open(array('url'=>'backend/savegrid', 'class'=>'form-newmenu')) }}
        <h2 class="form-signin-heading">{{ Lang::get('grid_manager::strings.addgrid') }}</h2>
        {{ Form::label(Lang::get('grid_manager::strings.route')) }}
        {{ Form::select('route', $routes) }}
        {{ Form::text('grid_name', null, array('class'=>'form-control', 'placeholder'=>Lang::get('grid_manager::strings.grid_name'))) }}
        {{ Form::text('grid_title', null , array('class'=>'form-control', 'placeholder'=>Lang::get('grid_manager::strings.grid_title'))) }}
        {{ Form::textarea('grid_description', null , array('class'=>'form-control', 'placeholder'=>Lang::get('grid_manager::strings.grid_description'))) }}

        {{ Form::submit(Lang::get('grid_manager::strings.addgrid'), array('class'=>'btn btn-large btn-primary'))}}
        {{ Form::close() }}
    </div>

</div>

