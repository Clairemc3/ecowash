<thead class="text-left bg-gray-200">
    <tr>

        @isset($before)
            {{ $before }}
        @endisset

        @foreach($headings as $heading)
            @cell(['heading']) {{ $heading }} @endcell
        @endforeach

        @isset($after)
        {{ $after }}
         @endisset
    </tr>
</thead>
