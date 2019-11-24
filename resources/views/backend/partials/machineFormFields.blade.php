<div class="form-group">
    <label for="name" class="block">Name*</label>
    <div id="nameHelp" class="input-help text-xs mb-1">Add the machine type here</div>
    <input required name="name" type="text" id="name" aria-describedby="name" placeholder="e.g. Small machines" value="{{ old('name', $machine->name ?? '')}}">
    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label for="price" class="block">Price*</label>
    <div id="priceHelp" class="input-help">Add price/load size here</div>
    <input required name="price" type="text" id="price" aria-describedby="price" placeholder="e.g. £5.00 for 10lb load" value="{{ old('price', $machine->price ?? '')}}">
    @error('price')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<div class="form-group">
    <label for="description" class="block">Description</label>
    <div id="descriptionHelp" class="input-help">Optional description</div>
    <input name="description" type="text" id="description" aria-describedby="description" placeholder="e.g. suitable for heavy duvets" value="{{ old('description', $machine->description ?? '')}}">
    @error('desription')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>