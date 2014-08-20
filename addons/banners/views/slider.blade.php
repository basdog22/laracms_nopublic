<div id="sequence">
    <ul class="sequence-canvas">
        @foreach($data as $item)
        <li class="bg4">
            <a href="{{ $item->url }}">
            <h2 class="title">{{ $item->title }}</h2>
            <!-- Slide Text -->
            <!-- Slide Image -->
            <img class="slide-img" src="{{ $item->image_url }}" alt="{{ $item->title }}" />
            </a>
        </li>
        @endforeach

    </ul>
    <div class="sequence-pagination-wrapper">
        <ul class="sequence-pagination">
            @foreach($data as $k=>$item)
            <li>{{$k}}</li>
            @endforeach
        </ul>
    </div>
</div>