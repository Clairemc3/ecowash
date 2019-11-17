@extends('layouts.backend')

@section('title', 'Machines')

@section('content')

<div class="flex flex-row items-center justify-between">
<h1>Machines</h1>
<button class="btn btn-teal inline-block">Add a machine</button>
</div>



@if ($machines->isEmpty())
    <p> You have no machines.</p>
    <p>Please add a machine with price details</p>
@else
@include('backend.tables.table', [
    'includeActions' => true,
    'headings' => ['Name', 'Price'],
    'models' => $machines,
    'properties' => ['name', 'price']])
@endif
    
@endSection