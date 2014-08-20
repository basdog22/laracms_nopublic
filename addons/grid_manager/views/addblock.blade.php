
<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        {{ Form::open(array('url'=>'backend/doaddblock', 'class'=>'form-newmenu')) }}
        <h2 class="form-signin-heading">{{ Lang::get('grid_manager::strings.addblock') }}</h2>
        {{ Form::hidden('gridid',$gridid[1]) }}
        {{ Form::hidden('block_position',$gridid[0]) }}
        {{ Form::label(Lang::get('grid_manager::strings.blocks')) }}
        <select class="view-select" name="block_title">
            <option disabled selected value="0">{{ Lang::get('strings.please_select') }}</option>
            @foreach($blocks as $k=>$v)
            <option value="{{ $k }}">{{$v['block_title']}}</option>
            @endforeach
        </select>
        {{ Form::submit(Lang::get('grid_manager::strings.addblock'), array('class'=>'btn btn-large btn-primary'))}}
        {{ Form::close() }}
    </div>

</div>

