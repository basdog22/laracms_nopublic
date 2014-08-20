<div class="row">
    <div id="breadcrumb" class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="{{ url('backend/dashboard') }}">{{ Lang::get('strings.dashboard') }}</a></li>
            <li><a href="{{ url('users/manage') }}">{{ Lang::get('strings.users') }}</a></li>
        </ol>
    </div>
</div>
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
    <div class="box-name">
        <i class="fa fa-cogs"></i>
        <span>{{ Lang::get('strings.users') }}</span>
    </div>
    <div class="box-icons">
        <a href="{{url('users/new')}}" class="modal-link" style="width: auto">
            <i class="fa fa-plus"></i>
            {{ Lang::get('strings.new_user') }}
        </a>

    </div>
    <div class="no-move"></div>
</div>
<div class="box-content no-padding">
    {{ $users->links() }}
<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="addonstable">
<thead>
<tr>
    <th>#</th>
    <th>{{ Lang::get('strings.user_img') }}</th>
    <th>{{ Lang::get('strings.email') }}</th>
    <th>{{ Lang::get('strings.lastname') }}</th>
    <th>{{ Lang::get('strings.firstname') }}</th>
    <th>{{ Lang::get('strings.actions') }}</th>
</tr>
</thead>
<tbody>
@foreach ($users as $user)
<tr>
    <td>{{ $user->id }}</td>
    <td><img src="http://www.gravatar.com/avatar/{{ md5($user->email) }}" class="img-rounded" alt="avatar" /></td>
    <td><a href="mailto:{{$user->email}}">{{ $user->email }}</a></td>
    <td>{{ $user->lastname }}</td>
    <td>{{ $user->firstname }}</td>
    <td>
        @if ($user->id==1)
        <a href="{{url('users/profile/')}}" class="btn btn-primary modal-link">{{Lang::get('strings.profile')}}</a>
        @else
        <div class="btn-group">
        <a href="{{url('users/profile/'.$user->id)}}" class="btn btn-primary modal-link">{{Lang::get('strings.profile')}}</a>
        <a href="{{url('users/edituser/'.$user->id)}}" class="btn btn-primary modal-link">{{Lang::get('strings.edit')}}</a>
        </div>
        @endif
    </td>
</tr>
@endforeach


<!-- End: list_row -->
</tbody>
<tfoot>
<tr>
    <th>#</th>
    <th>{{ Lang::get('strings.user_img') }}</th>
    <th>{{ Lang::get('strings.email') }}</th>
    <th>{{ Lang::get('strings.lastname') }}</th>
    <th>{{ Lang::get('strings.firstname') }}</th>
    <th>{{ Lang::get('strings.actions') }}</th>
</tr>
</tfoot>
</table>
    {{ $users->links() }}
</div>
</div>
</div>
</div>

