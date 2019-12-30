<div class="mb-4 {{ $display ?? 'block'}}">
<label for="{{ $name }}" class="block">{{ $label }}</label>

    @if (isset($helpText))
        <div id="{{$name}}Help" class="input-help text-xs mb-1">{{ $helpText }}</div>
    @endif
    <input required name="{{$name}}" type="text" id="{{$name}}" aria-describedby="{{$name}}"
    @if (isset($placeholder)) placeholder="{{ $placeholder }}" @endif
    value="{{$value}}">
    @error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
