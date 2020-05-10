@extends('layouts.backend')

@section('title', 'Machines')

@section('content')
  <h1>Add a promotion</h1>

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

    <x-form action="{{ route('admin.promotion.store')}}">
        @include('backend.partials.promotionFormFields')
        <div class="button-group">
            <button type="submit" class="btn btn-teal">Submit</button>
            <button class="btn btn-white"> <a href="{{route('admin.promotion.index')}}">Cancel</a></button>
        </div>
    </x-form>
@endSection
