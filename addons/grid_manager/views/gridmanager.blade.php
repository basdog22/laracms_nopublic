<div class="row">
    <div id="breadcrumb" class="col-md-12">
        <ol class="breadcrumb ">
            <li><a href="{{ url('backend/dashboard') }}">{{ Lang::get('strings.dashboard') }}</a></li>
            <li><a href="{{ url('backend/gridmanager') }}">{{ Lang::get('grid_manager::strings.gridmanager') }}</a></li>
            <li class="pull-right"><a style="margin: 0;line-height: 38px" href="{{ url('backend/addgrid') }}"  class="modal-link btn btn-success">{{Lang::get('grid_manager::strings.create_new_grid')}}</a></li>
        </ol>

    </div>
</div>
<div class="row">
    <div id="gridmanager" class="col-md-12">
        <div class="box">
            <div class="box-header">
                <div class="box-name">
                    <i class="fa fa-search"></i>
                    <span>{{ Lang::get('grid_manager::strings.gridmanager') }}</span>
                </div>

            </div>
            <div class="box-content">
                <div id="tabs">
                    <ul>

                        @foreach($grids as $grid)
                        <li><a style="padding-right: 30px" href="#grid_{{ $grid->id }}">{{ $grid->grid_name }}</a> @if($grid->id>1) <a style="margin-left: -36px" class="fa fa-cog modal-link" href="{{ url('backend/editgrid/'.$grid->id) }}"></a>@endif</li>
                        @endforeach
                    </ul>

                    @foreach($grids as $grid)
                    <div id="grid_{{ $grid->id }}" class="clearfix">
                        @foreach($positions as $k=>$position)
                        <div class="box clearfix row">
                            <div class="box-header">{{$k}}</div>
                            <div class="box-content clearfix ">
                                @foreach($position as $b=>$block)
                                <div id="bgrid-{{$b}}" class="col-md-{{$block['cols']}} @if(isset($block['offset']))
                                 col-md-offset-{{$block['offset']}}
                                 @endif
                                 @if(isset($block['pull']))
                                 pull-{{$block['pull']}}
                                 @endif
                                 box" style="margin: 5px;padding:0">
                                    <div class="box-header">
                                        <div class="box-name">
                                            <span>{{ $block['title'] }}</span>
                                        </div>
                                        <div class="box-icons">
                                            <a class="modal-link pull-right" href="{{ url('backend/addblock/'.$b.'-'.$grid->id) }}"><i class="fa fa-plus "></i></a>
                                        </div>
                                    </div>
                                    <div class="box-content drop">
                                        @foreach($grid->blocks as $blocks)
                                            @if($blocks->block_position==$b)
                                            <div class="box drg" id="{{$blocks->id}}">
                                                <div class="box-header">
                                                    <div class="box-name">
                                                        <span>{{$blocks->block_title}}</span>
                                                    </div>
                                                    <div class="box-icons pull-right">
                                                        <a class="modal-link" href="{{ url('backend/editblock/'.$blocks->id) }}"><i class="fa fa-pencil "></i></a>
                                                        <a class="delbtn" href="{{ url('backend/delblock/'.$blocks->id) }}"><i class="fa fa-trash-o"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
