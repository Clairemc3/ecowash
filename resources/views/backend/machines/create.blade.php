@extends('layouts.backend')

@section('title', 'Machines')

@section('content')
  <h1>Add a machine type</h1>

{{--  These need styling --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <div class="bg-white rounded">
    <form action={{ route('admin.machine.store')}} method="POST" class="p-8">
        @csrf
        @include('backend.partials.machineFormFields')
        <div class="button-group">
          <button type="submit" class="btn btn-teal">Submit</button>
          <button class="btn btn-white"> <a href="{{route('admin.machine.index')}}">Cancel</a></button>
        </div>
      </form>
  </div>
@endSection
