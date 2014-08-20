<div style="margin: 5px;padding:0" class="box">
    <div class="box-header">
        <div class="box-name">
            <span>{{ Lang::get('strings.search_results') }}</span>
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
                        <li><a href="{{ url('backend/edit'.$sub['content']['slug']).'/'.$item->id }}">{{$item->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
    </div>                                                                                                                                                                                                                                                                                                                                                    </div>
</div>
