@foreach($data as $item)
    <a href="{{ $item->url }}">
    <img src="{{ $item->image_url }}" alt="{{ $item->title }}" />
    </a>
@endforeach