<div class="row">
    <div id="breadcrumb" class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="{{ url('backend/dashboard') }}">{{ Lang::get('strings.dashboard') }}</a></li>
            <li><a href="{{ url('backend/banners') }}">{{ Lang::get('banners::strings.banners') }}</a></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="box-name">
                    <i class="fa fa-cogs"></i>
                    <span>{{ Lang::get('banners::strings.banners') }}</span>
                </div>
                <div class="box-icons">
                    <a href="{{url('backend/newbanner')}}" class="modal-link" style="width: auto">
                        <i class="fa fa-plus"></i>
                        {{ Lang::get('banners::strings.new_banner') }}
                    </a>

                </div>
                <div class="no-move"></div>
            </div>
            <div class="box-content no-padding">
                {{ $banners->links() }}
                <table class="table table-bordered table-striped table-hover table-heading table-datatable" id="addonstable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ Lang::get('banners::strings.banner_image') }}</th>
                        <th>{{ Lang::get('banners::strings.banner_title') }}</th>
                        <th>{{ Lang::get('banners::strings.banner_url') }}</th>
                        <th>{{ Lang::get('strings.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($banners as $banner)
                    <tr>
                        <td>{{ $banner->id }}</td>
                        <td><img src="{{ $banner->image_url }}" </td>
                        <td><a class="modal-link" href="{{ url('backend/editbanner/'.$banner->id) }}">{{ $banner->title }}</a></td>
                        <td>{{ $banner->url }}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-default modal-link" href="{{ url('backend/editbanner/'.$banner->id) }}">{{ Lang::get('strings.edit') }}</a>

                                <a class="btn btn-danger delbtn" href="{{ url('backend/delbanner/'.$banner->id) }}">{{ Lang::get('strings.delete') }}</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach


                    <!-- End: list_row -->
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>{{ Lang::get('banners::strings.banner_image') }}</th>
                        <th>{{ Lang::get('banners::strings.banner_title') }}</th>
                        <th>{{ Lang::get('banners::strings.banner_url') }}</th>
                        <th>{{ Lang::get('strings.actions') }}</th>
                    </tr>
                    </tfoot>
                </table>
                {{ $banners->links() }}
            </div>
        </div>
    </div>
</div>

