<img
    @switch($size)
        @case('table')
    class="sm:h-20"
        @default
        class="sm:h-12"
    @endswitch

    src="{{ $imageUrl }}"
>

