@extends('layouts.backend')

@section('title', 'Machines')

@section('content')

<h1>Add a machine type</h1>
<div class="bg-white rounded">
  <form action={{ route('admin.machine.store')}} method="POST" class="p-8">
      @csrf
      <div class="form-group">
        <label for="name" class="block mb-1">Name*</label>
        <div id="nameHelp" class="input-help text-xs mb-1">Add the machine type here</div>
        <input required name="name" type="text" class="" id="name" aria-describedby="name" placeholder="e.g. Small machines">
      </div>
      <div class="form-group">
          <label for="price" class="block">Price*</label>
          <div id="priceHelp" class="input-help">Add price/load size here</div>
          <input required name="price" type="text" class="" id="price" aria-describedby="price" placeholder="e.g. £5.00 for 10lb load">
        </div>
        <div class="form-group">
          <label for="description" class="block">Description</label>
          <div id="descriptionHelp" class="input-help">Optional description</div>
          <input name="description" type="text" class="" id="description" aria-describedby="description" placeholder="e.g. suitable for heavy duvets">
        </div>
      <div class="button-group">
        <button type="submit" class="btn btn-teal">Submit</button>
        <button type="submit" class="btn btn-white"> <a href="{{route('admin.machine.index')}}">Cancel</a></button>
      </div>
    </form>
</div>


    
@endSection