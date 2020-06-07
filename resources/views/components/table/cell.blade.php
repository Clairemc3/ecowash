@php($type = $type ?? 'cell')
@php($class = 'py-2 px-4 sm:py-4' . ($class ?? '') )
@php($class = ( isset($hideOnMobile) ? 'hidden sm:table-cell ' : '') . $class )
@if ($type === 'heading' ?? false)
    <th class="{{ $class }}"> {{ $slot }}</th>
@else
    <td class="{{ $class }}"> {{ $slot }}</td>
@endif
