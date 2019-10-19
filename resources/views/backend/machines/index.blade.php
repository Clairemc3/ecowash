@extends('layouts.backend')

@section('title', 'Machines')

@section('content')

<h1>Machines</h1>

<ul>
    @forelse ($machines as $machine)
        <li>
            <a href="{{ $machine->path() }}">{{ $machine->name }}</a>
        </li>
    @empty
        <li>No machines here. Please add one.</li>    
    @endforelse
</ul>
    
@endSection