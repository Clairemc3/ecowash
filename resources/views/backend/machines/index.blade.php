@extends('layouts.backend')

@section('title', 'Machines')

@section('content')

<h1>Machines</h1>


@if ($machines->isEmpty())
    <p> You have no machines.</p>
    <p>Please add a machine with price detailss</p>
@else
@include('backend.tables.table-responsive', [
    'includeActions' => true,
    'headings' => ['Name', 'Price'],
    'models' => $machines,
    'properties' => ['name', 'price']])
@endif
    
@endSection