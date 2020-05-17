<div class="mb-4 mt-4 {{ $display ?? 'block'}}">
    @if (isset($label))
        <label class="inline-block mr-4 items-center my-1 mb-2" for="{{ $name }}">{{ $label }}</label>
    @endif
    @if (isset($helpText))
         <div id="{{$name}}Help" class="input-help text-xs mb-1">{{ $helpText }}</div>
    @endif

        {{-- Vue component --}}
        <wysiwyg value="{{ $inputValue }}" name="{{ $inputName }}"></wysiwyg>

</div>
