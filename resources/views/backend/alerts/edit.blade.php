@extends('layouts.backend')

@section('title', 'Create an alert')

@section('content')
  <h1>Edit this alert</h1>

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
    <form action={{ route('admin.alert.update', ['alert' => $alert])}} method="POST" class="p-8">
        @csrf
        @method('PUT')
        @include('backend.partials.alertFormFields')
        <div class="button-group">
          <button type="submit" class="btn btn-teal">Submit</button>
          <button class="btn btn-white"> <a href="{{route('admin.alert.index')}}">Cancel</a></button>
        </div>
      </form>
  </div>
@endSection
