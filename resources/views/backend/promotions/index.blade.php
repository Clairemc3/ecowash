@extends('layouts.backend')

@section('title', 'Promotions')

@section('content')

{{-- Resource index header --}}
@resourceIndexHeader([
    'title' => 'Promotions',
    'createRoute' => route('admin.promotion.create'),
    'addResourceText' => 'Add a promotion block'])


@if ($promotions->isEmpty())
    <p>There are no promotional blocks</p>
@else
@resourceTable([
    'includeActions' => true,
    'headings' => ['Position', ''],
    'models' => $promotions,
    'properties' => ['position', 'help_text']])
@endif

@endSection
