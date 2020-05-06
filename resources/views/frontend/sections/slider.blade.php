@if ($slides->isNotEmpty())
    <div class="section">
        <slider :slides="{{$slides}}">
        </slider>
    </div>
@endif
