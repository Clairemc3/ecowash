@if ($heading ?? false)
    <th class="py-2 px-4 sm:py-4 sm:px-6 {{$class ?? ''}}"> {{ $slot }}</th>
@else
    <td class=" py-2 px-4 sm:py-4 sm:px-6 {{$class ?? ''}}"> {{ $slot }}</td>
@endif
