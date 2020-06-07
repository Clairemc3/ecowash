@extends('layouts.backend')

@section('title', 'Activate your account')

@section('content')
    <h1>Activate your account</h1>

    <x-card>
        {{ $error }}
    </x-card>
@endSection