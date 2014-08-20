<div class="row">
    <div id="breadcrumb" class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="{{ url('backend/dashboard') }}">{{ Lang::get('strings.dashboard') }}</a></li>
            <li><a href="{{ url('themes/manage') }}">{{ Lang::get('strings.themes') }}</a></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="box-name">
                    <i class="fa fa-cogs"></i>
                    <span>{{ Lang::get('strings.themes') }}</span>
                </div>
                <div class="box-icons">
                    <a href="{{url('themes/new')}}" class="modal-link" style="width: auto">
                        <i class="fa fa-plus"></i>
                        {{ Lang::get('strings.new_theme') }}
                    </a>

                </div>
                <div class="no-move"></div>
            </div>
            <div class="box-content no-padding">
                <table class="table table-bordered table-striped table-hover table-heading table-datatable" id="themestable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ Lang::get('strings.theme_img') }}</th>
                        <th>{{ Lang::get('strings.theme_name') }}</th>
                        <th>{{ Lang::get('strings.theme_title') }}</th>
                        <th>{{ Lang::get('strings.version') }}</th>
                        <th>{{ Lang::get('strings.installed') }}</th>
                        <th>{{ Lang::get('strings.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($themes as $theme)
                    <tr>
                        <td> @if($theme->installed && $theme->active)
                            <label class="label label-success">{{ $theme->id }}</label>
                            @else
                            {{ $theme->id }}
                            @endif</td>
                        <td><img class="img-rounded" src="{{ $theme->icon_image }}" alt="" /></td>
                        <td><a target="_blank" href="{{ url($theme->url) }}">{{ $theme->theme_name }}</a>

                        </td>
                        <td>{{ $theme->theme_title }}</td>
                        <td>{{ $theme->version }}</td>
                        <td>{{ ($theme->installed)?Lang::get('strings.yes'):Lang::get('strings.no') }}</td>
                        <td>
                            @if ($theme->id==1 || $theme->theme_name=='default')
                            -
                            @else
                            <a class="btn btn-{{ ($theme->installed)?'danger':'success' }}" href="{{ ($theme->installed)?url('themes/uninstall/'.$theme->id):url('themes/install/'.$theme->id)}}">
                                {{ ($theme->installed)?Lang::get('strings.uninstall'):Lang::get('strings.install') }}
                            </a>
                            @endif
                            @if($theme->installed && !$theme->active)
                            <a class="btn btn-success" href="{{ url('themes/activate/'.$theme->id) }}">{{ Lang::get('strings.set_default') }}</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach


                    <!-- End: list_row -->
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>{{ Lang::get('strings.theme_img') }}</th>
                        <th>{{ Lang::get('strings.theme_name') }}</th>
                        <th>{{ Lang::get('strings.theme_title') }}</th>
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

