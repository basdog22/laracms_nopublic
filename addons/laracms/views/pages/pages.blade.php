<div class="row">
    <div id="breadcrumb" class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="{{ url('backend/dashboard') }}">{{ Lang::get('strings.dashboard') }}</a></li>
            <li><a href="{{ url('backend/pages') }}">{{ Lang::get('laracms::strings.pages') }}</a></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="box-name">
                    <i class="fa fa-cogs"></i>
                    <span>{{ Lang::get('laracms::strings.pages') }}</span>
                </div>
                <div class="box-icons">
                    <a href="{{url('backend/newpage')}}" style="width: auto">
                        <i class="fa fa-plus"></i>
                        {{ Lang::get('laracms::strings.new_page') }}
                    </a>

                </div>
                <div class="no-move"></div>
            </div>
            <div class="box-content no-padding">
                {{ $pages->links() }}
                <table class="table table-bordered table-striped table-hover table-heading table-datatable" id="addonstable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ Lang::get('strings.title') }}</th>
                        <th>{{ Lang::get('strings.version') }}</th>
                        <th>{{ Lang::get('strings.status') }}</th>
                        <th>{{ Lang::get('strings.created_at') }}</th>
                        <th>{{ Lang::get('strings.updated_at') }}</th>
                        <th>{{ Lang::get('strings.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($pages as $page)
                    <tr>
                        <td>{{ $page->id }}</td>
                        <td><a href="{{ url('backend/editpage/'.$page->id) }}">{{ $page->title }}</a></td>
                        <td>{{ $page->version }}</td>
                        <td>{{ ($page->status)?Lang::get('laracms::strings.published'):Lang::get('laracms::strings.draft') }}</td>
                        <td>{{ $page->created_at }}</td>
                        <td>{{ $page->updated_at }}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-default modal-link" href="{{ url('backend/editpage/'.$page->id) }}">{{ Lang::get('strings.edit') }}</a>
                                <a class="btn btn-danger delbtn" href="{{ url('backend/delpage/'.$page->id) }}">{{ Lang::get('strings.delete') }}</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach


                    <!-- End: list_row -->
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>{{ Lang::get('strings.title') }}</th>
                        <th>{{ Lang::get('strings.version') }}</th>
                        <th>{{ Lang::get('strings.status') }}</th>
                        <th>{{ Lang::get('strings.created_at') }}</th>
                        <th>{{ Lang::get('strings.updated_at') }}</th>
                        <th>{{ Lang::get('strings.actions') }}</th>
                    </tr>
                    </tfoot>
                </table>
                {{ $pages->links() }}
            </div>
        </div>
    </div>
</div>

