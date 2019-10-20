@extends('layouts.backend')

@section('title', 'Machines')

@section('content')

<h1>Add a machine type</h1>

<form action={{ route('admin.machine.store')}} method="POST">
    @csrf
    <div class="form-group">
      <label for="name">Name*</label>
      <input required name="name" type="text" class="form-control" id="name" aria-describedby="name" placeholder="e.g. Small machines">
      <small id="nameHelp" class="form-text text-muted">Add the machine type here</small>
    </div>
    <div class="form-group">
        <label for="price">Price*</label>
        <input required name="price" type="text" class="form-control" id="price" aria-describedby="price" placeholder="e.g. £5.00 for 10lb load">
        <small id="priceHelp" class="form-text text-muted">Add price/load size here</small>
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <input name="description" type="text" class="form-control" id="description" aria-describedby="description" placeholder="e.g. suitable for heavy duvets">
        <small id="descriptionHelp" class="form-text text-muted">Optional description</small>
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a class="btn btn-secondary" href="{{route('admin.machine.index')}}">Cancel</a>
  </form>


    
@endSection