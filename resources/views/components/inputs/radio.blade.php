<div class=" mb-4 {{ $display ?? 'block'}}">
    <label class="inline-block mr-4 items-center my-1 mb-2" for="{{ $name }}">{{ $label }}</label>

    @if (isset($helpText))
        <div id="{{$name}}Help" class="input-help text-xs mb-1">{{ $helpText }}</div>
    @endif
     {{ $options }}
    @error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
