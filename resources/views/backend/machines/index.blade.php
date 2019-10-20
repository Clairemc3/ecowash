@extends('layouts.backend')

@section('title', 'Machines')

@section('content')

<h1>Machines</h1>


@if ($machines->isEmpty())
    <p> You have no machines.</p>
    <p>Please add a machine with price detailss</p>
@else
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Edit</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($machines as $machine)
            <tr>
            <th scope="row">{{$loop->iteration}}</th>
                <td>{{$machine->name}}</td>
                <td>{{$machine->price}}</td>
                <td>Edit Delete</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
    
@endSection