
<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        {{ Form::open(array('url'=>'backend/savegrid', 'class'=>'form-newmenu')) }}
        <h2 class="form-signin-heading">{{ Lang::get('grid_manager::strings.editgrid') }}</h2>
        {{ Form::label(Lang::get('grid_manager::strings.route')) }}
        {{ Form::hidden('id', $grid->id) }}
        {{ Form::select('route', $routes,$grid->route) }}
        {{ Form::text('grid_name', $grid->grid_name, array('class'=>'form-control', 'placeholder'=>Lang::get('grid_manager::strings.grid_name'))) }}
        {{ Form::text('grid_title', $grid->grid_title , array('class'=>'form-control', 'placeholder'=>Lang::get('grid_manager::strings.grid_title'))) }}
        {{ Form::textarea('grid_description', $grid->grid_description , array('class'=>'form-control', 'placeholder'=>Lang::get('grid_manager::strings.grid_description'))) }}

        {{ Form::submit(Lang::get('grid_manager::strings.savegrid'), array('class'=>'btn btn-large btn-primary'))}}
        <a href="{{ url('backend/delgrid/'.$grid->id) }}" class="delbtn btn btn-danger pull-right">{{ Lang::get('strings.delete') }}</a>
        {{ Form::close() }}
    </div>

</div>

