<div class="col-md-12">
    <div class="dummy clearfix" style="height: 500px;overflow: auto">
    <div class="dummy">
    <div class="dummy">
        @foreach($content as $type)
        <div class="dummy">
            <a href="#" class="close-popup" data-appendto="image_url" data-href="/uploads/{{ $type }}">
                <img class="col-md-2 img-responsive" src="/{{ $type }}" />
            </a>
        </div>
        @endforeach
        </div>
    </div>
    </div>
</div>
