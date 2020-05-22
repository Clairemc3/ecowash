

@if (isset($link))
    <div class="card mx-auto md:mx-4 border-4  border-transparent hover:border-yellow-300">
        <a href="{{ $link}} ">
            <div class="card-content">
                @isset($heading)<h3 class="card-header">{{ $heading }}</h3>@endisset
                {{ $slot }}
            </div>
        </a>
    </div>
@else
    <div class="card m-auto md:mx-4">
        <div class="card-content">
          @isset($heading)  <h3 class="card-header">{{ $heading }}</h3>@endisset
            {{ $slot }}
        </div>
    </div>
@endif
