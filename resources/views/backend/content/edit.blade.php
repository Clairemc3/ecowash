@extends('layouts.backend')

@section('title', 'Machines')

@section('content')
    <h1>Edit this content block</h1>

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
    <form action="{{ $content->path() }}" method="POST" class="p-8">
        @csrf
        @method('PUT')
        <p>{{ $content->help_text }}</p>
        @include('backend.partials.contentFormFields')
        <div class="button-group">
            <button type="submit" class="btn btn-teal">Submit</button>
            <button class="btn btn-white"> <a href="{{route('admin.content.index')}}">Cancel</a></button>
            </div>
        </form>
    </div>

@endSection
