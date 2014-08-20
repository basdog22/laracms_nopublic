<div class="row">
    <div id="breadcrumb" class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="{{ url('backend/dashboard') }}">{{ Lang::get('strings.dashboard') }}</a></li>
            <li><a href="{{ url('backend/menus') }}">{{ Lang::get('laracms::strings.menus') }}</a></li>
            <li><a href="{{ url('backend/menuitems/'.$menu->id) }}">{{ Lang::get('laracms::strings.menuitems') }}</a></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="box-name">
                    <i class="fa fa-cogs"></i>
                    <span>{{ Lang::get('laracms::strings.menuitems') }}</span>
                </div>
                <div class="box-icons">
                    <a href="{{url('backend/newmenuitem/'.$menu->id)}}" class="modal-link" style="width: auto">
                        <i class="fa fa-plus"></i>
                        {{ Lang::get('laracms::strings.new_menuitem') }}
                    </a>

                </div>
                <div class="no-move"></div>
            </div>
            <div class="box-content no-padding">
                <table class="table table-bordered table-striped table-hover table-heading table-datatable" id="addonstable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ Lang::get('laracms::strings.menuitem_sort') }}</th>
                        <th>{{ Lang::get('laracms::strings.menuitem_title') }}</th>
                        <th>{{ Lang::get('strings.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($menuitems as $menuitem)
                    <tr>
                        <td>{{ $menuitem->id }}</td>
                        <td><input class="auto-update-sort col-md-1" id="{{ $menuitem->id }}" type="number" value="{{ $menuitem->sort }}" /></td>
                        <td><a href="{{ url('backend/editmenuitem/'.$menuitem->id) }}">{{ $menuitem->link_text }}</a></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-default modal-link" href="{{ url('backend/editmenuitem/'.$menuitem->id) }}">{{ Lang::get('strings.edit') }}</a>
                                <a class="btn btn-danger delbtn" href="{{ url('backend/delmenuitem/'.$menuitem->id) }}">{{ Lang::get('strings.delete') }}</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach


                    <!-- End: list_row -->
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>{{ Lang::get('laracms::strings.menuitem_sort') }}</th>
                        <th>{{ Lang::get('laracms::strings.menuitem_title') }}</th>
                        <th>{{ Lang::get('strings.actions') }}</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

