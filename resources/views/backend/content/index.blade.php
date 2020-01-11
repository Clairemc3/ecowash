@extends('layouts.backend')

@section('title', 'Machines')

@section('content')

{{-- Resource index header --}}
@resourceIndexHeader([
    'title' => 'Content',
    'createRoute' => route('admin.content.create'),
    'addResourceText' => 'Add content'])

@if ($contentRecords->isEmpty())
    <p>No content records</p>
@else
@include('tables.resourceTable', [
    'includeActions' => true,
    'headings' => ['Content location'],
    'models' => $contentRecords,
    'properties' => ['help_text']])
@endif

@endSection
