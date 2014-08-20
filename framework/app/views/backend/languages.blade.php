<div class="row">
    <div id="breadcrumb" class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="{{ url('backend/dashboard') }}">{{ Lang::get('strings.dashboard') }}</a></li>
            <li><a href="{{ url('languages/manage') }}">{{ Lang::get('strings.languages') }}</a></li>
        </ol>
    </div>
</div>
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
    <div class="box-name">
        <i class="fa fa-cogs"></i>
        <span>{{ Lang::get('strings.languages') }}</span>
    </div>
    <div class="box-icons">
        <a href="{{url('languages/new')}}" class="modal-link" style="width: auto">
            <i class="fa fa-plus"></i>
            {{ Lang::get('strings.new_lang') }}
        </a>

    </div>
    <div class="no-move"></div>
</div>
<div class="box-content no-padding">
<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="langstable">
<thead>
<tr>
    <th>#</th>
    <th>{{ Lang::get('strings.image') }}</th>
    <th>{{ Lang::get('strings.lang_code') }}</th>
    <th>{{ Lang::get('strings.title') }}</th>
    <th>{{ Lang::get('strings.status') }}</th>
    <th>{{ Lang::get('strings.actions') }}</th>
</tr>
</thead>
<tbody>
@foreach ($langs as $lang)
<tr>
    <td>{{ $lang->id }}</td>
    <td><img class="img-rounded" src="{{ $lang->image }}" alt="" /></td>
    <td>{{ $lang->code }}</td>
    <td>{{ $lang->title }}</td>
    <td>{{ ($lang->active)?Lang::get('strings.yes'):Lang::get('strings.no') }}</td>
    <td>
        <a class="btn btn-{{ ($lang->active)?'danger':'success' }}" href="{{ ($lang->active)?url('languages/toggle/'.$lang->id):url('languages/toggle/'.$lang->id)}}">
            {{ ($lang->active)?Lang::get('strings.deactivate'):Lang::get('strings.activate') }}
        </a>
        @if($lang->id>1)
        <a class="btn btn-danger delbtn" href="{{ url('languages/del/'.$lang->id) }}">@lang('strings.delete')</a>
        @endif
    </td>
</tr>
@endforeach


<!-- End: list_row -->
</tbody>
<tfoot>
<tr>
    <th>#</th>
    <th>{{ Lang::get('strings.image') }}</th>
    <th>{{ Lang::get('strings.lang_code') }}</th>
    <th>{{ Lang::get('strings.title') }}</th>
    <th>{{ Lang::get('strings.status') }}</th>
    <th>{{ Lang::get('strings.actions') }}</th>
</tr>
</tfoot>
</table>
</div>
</div>
</div>
</div>

