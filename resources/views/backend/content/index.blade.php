@extends('layouts.backend')

@section('title', 'Machines')

@section('content')

{{-- Resource index header --}}
@component('backend.components.resourceIndexHeader')
    @slot('title')Content @endslot
    @slot('createRoute') {{ route('admin.content.create') }} @endslot
    @slot('addResourceText') Add a content record @endslot
@endcomponent

@if ($contentRecords->isEmpty())
    <p>No content records</p>
@else
@include('backend.tables.table', [
    'includeActions' => true,
    'headings' => ['Content location'],
    'models' => $contentRecords,
    'properties' => ['help_text']])
@endif
    
@endSection