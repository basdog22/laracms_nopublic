<div style="margin: 5px;padding:0" class="box">
    <div class="box-header">
        <div class="box-name">
            <span>{{ Lang::get('laracms::strings.seo') }}</span>
        </div>
    </div>
    <div class="box-content">
        <div id="tabs">
                <ul>
                    @foreach($results as $k=>$sub)
                    <li><a style="padding-right: 30px" href="#content_{{ $k }}">{{ $sub['content']['title'] }}</a></li>
                    @endforeach
                </ul>
                @foreach($results as $k=>$sub)

                <div id="content_{{$k}}">
                    <ul class="nav nav-stacked">
                        @foreach($sub['data'] as $item)
                        <li>
                            <table class="table table-hover">
                                <thead>
                                    <th>@lang('strings.title')</th>
                                    <th>@lang('laracms::strings.seo_title')</th>
                                    <th>@lang('laracms::strings.seo_description')</th>
                                    <th>@lang('laracms::strings.seo_keywords')</th>
                                    <th>@lang('strings.edit')</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="{{ url('backend/edit'.$sub['content']['slug']).'/'.$item->id }}">{{$item->title}}</a></td>
                                        <td>{{$item->seo->first()->title or ''}}</td>
                                        <td>{{$item->seo->first()->description or ''}}</td>
                                        <td>{{$item->seo->first()->keywords or ''}}</td>
                                        <td>
                                            <a href="{{ url('backend/editseo/'.$sub['content']['model'].'/'.$item->id) }}" class="modal-link btn btn-default">@lang('strings.edit')</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </li>
                        @endforeach
                    </ul>
                    {{ $sub['data']->links() }}
                </div>
                @endforeach
            </div>
    </div>                                                                                                                                                                                                                                                                                                                                                    </div>
</div>
