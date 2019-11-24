@extends('layouts.backend')

@section('title', 'Machines')

@section('content')

{{-- Resource index header --}}
@component('backend.components.resourceIndexHeader')
    @slot('title')Machines @endslot
    @slot('createRoute') {{ route('admin.machine.create') }} @endslot
    @slot('addResourceText') machine @endslot
@endcomponent


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