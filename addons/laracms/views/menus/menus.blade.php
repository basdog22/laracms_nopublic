<div class="row">
    <div id="breadcrumb" class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="{{ url('backend/dashboard') }}">{{ Lang::get('strings.dashboard') }}</a></li>
            <li><a href="{{ url('backend/menus') }}">{{ Lang::get('laracms::strings.menus') }}</a></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="box-name">
                    <i class="fa fa-cogs"></i>
                    <span>{{ Lang::get('laracms::strings.menus') }}</span>
                </div>
                <div class="box-icons">
                    <a href="{{url('backend/newmenu')}}" class="modal-link" style="width: auto">
                        <i class="fa fa-plus"></i>
                        {{ Lang::get('laracms::strings.new_menu') }}
                    </a>

                </div>
                <div class="no-move"></div>
            </div>
            <div class="box-content no-padding">
                {{ $menus->links() }}
                <table class="table table-bordered table-striped table-hover table-heading table-datatable" id="addonstable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ Lang::get('laracms::strings.menu_name') }}</th>
                        <th>{{ Lang::get('laracms::strings.menu_title') }}</th>
                        <th>{{ Lang::get('strings.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($menus as $menu)
                    <tr>
                        <td>{{ $menu->id }}</td>
                        <td><a href="{{ url('backend/menuitems/'.$menu->id) }}">{{ $menu->menu_name }}</a></td>
                        <td>{{ $menu->menu_title }}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-default modal-link" href="{{ url('backend/editmenu/'.$menu->id) }}">{{ Lang::get('strings.edit') }}</a>
                                <a class="btn btn-default" href="{{ url('backend/menuitems/'.$menu->id) }}">{{ Lang::get('laracms::strings.menuitems') }}</a>
                                <a class="btn btn-danger delbtn" href="{{ url('backend/delmenu/'.$menu->id) }}">{{ Lang::get('strings.delete') }}</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach


                    <!-- End: list_row -->
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>{{ Lang::get('laracms::strings.menu_name') }}</th>
                        <th>{{ Lang::get('laracms::strings.menu_title') }}</th>
                        <th>{{ Lang::get('strings.actions') }}</th>
                    </tr>
                    </tfoot>
                </table>
                {{ $menus->links() }}
            </div>
        </div>
    </div>
</div>

