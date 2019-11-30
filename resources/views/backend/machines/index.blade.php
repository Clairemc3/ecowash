@extends('layouts.backend')

@section('title', 'Machines')

@section('content')

{{-- Resource index header --}}
@resourceIndexHeader([
    'title' => 'Machines',
    'createRoute' => route('admin.machine.create'),
    'addResourceText' => 'Add a machine'])


@if ($machines->isEmpty())
    <p> You have no machines.</p>
    <p>Please add a machine with price details</p>
@else
@resourceTable([
    'includeActions' => true,
    'headings' => ['Name', 'Price'],
    'models' => $machines,
    'properties' => ['name', 'price']])
@endif
    
@endSection