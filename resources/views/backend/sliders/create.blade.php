@extends('layouts.backend')

@section('title', 'Sliders')

@section('content')
  <h1>Add a slider</h1>

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
    <form action={{ route('admin.slider.store')}} method="POST" class="p-8">
        @csrf
        @include('backend.partials.sliderFormFields')
        <div class="button-group">
          <button type="submit" class="btn btn-teal">Submit</button>
          <button class="btn btn-white"> <a href="{{route('admin.slider.index')}}">Cancel</a></button>
        </div>
      </form>
  </div>
@endSection
