<div class="row">
    <div id="breadcrumb" class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="{{ url('backend/dashboard') }}">{{ Lang::get('strings.dashboard') }}</a></li>
            <li><a href="{{ url('addons/manage') }}">{{ Lang::get('strings.addons') }}</a></li>
        </ol>
    </div>
</div>
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
    <div class="box-name">
        <i class="fa fa-cogs"></i>
        <span>{{ Lang::get('strings.addons') }}</span>
    </div>
    <div class="box-icons">
        <a href="{{url('addons/new')}}" class="modal-link" style="width: auto">
            <i class="fa fa-plus"></i>
            {{ Lang::get('strings.new_addon') }}
        </a>

    </div>
    <div class="no-move"></div>
</div>
<div class="box-content no-padding">
<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="addonstable">
<thead>
<tr>
    <th>#</th>
    <th>{{ Lang::get('strings.addon_img') }}</th>
    <th>{{ Lang::get('strings.addon_name') }}</th>
    <th>{{ Lang::get('strings.addon_title') }}</th>
    <th>{{ Lang::get('strings.version') }}</th>
    <th>{{ Lang::get('strings.installed') }}</th>
    <th>{{ Lang::get('strings.actions') }}</th>
</tr>
</thead>
<tbody>
@foreach ($addons as $addon)
<tr>
    <td>{{ $addon->id }}</td>
    <td><img class="img-rounded" src="{{ $addon->icon_image }}" alt="" /></td>
    <td><a target="_blank" href="{{ url($addon->url) }}">{{ $addon->addon_name }}</a></td>
    <td>{{ $addon->addon_title }}</td>
    <td>{{ $addon->version }}</td>
    <td>{{ ($addon->installed)?Lang::get('strings.yes'):Lang::get('strings.no') }}</td>
    <td>
        @if ($addon->id<2 || $addon->addon_name=='laracms' || $addon->addon_name=='grid_manager')
        -
        @else
        <a class="btn btn-{{ ($addon->installed)?'danger':'success' }}" href="{{ ($addon->installed)?url('addons/uninstall/'.$addon->id):url('addons/install/'.$addon->id)}}">
            {{ ($addon->installed)?Lang::get('strings.uninstall'):Lang::get('strings.install') }}
        </a>
        @endif
    </td>
</tr>
@endforeach


<!-- End: list_row -->
</tbody>
<tfoot>
<tr>
    <th>#</th>
    <th>{{ Lang::get('strings.addon_img') }}</th>
    <th>{{ Lang::get('strings.addon_name') }}</th>
    <th>{{ Lang::get('strings.addon_title') }}</th>
    <th>{{ Lang::get('strings.version') }}</th>
    <th>{{ Lang::get('strings.installed') }}</th>
    <th>{{ Lang::get('strings.actions') }}</th>
</tr>
</tfoot>
</table>
</div>
</div>
</div>
</div>

