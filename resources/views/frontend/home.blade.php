@extends('layouts.frontend')


@section('title', 'Launderette in Godalming')

@section('mainMenu')
    @parent
@endsection

@section('content')

    {{-- Promotion Top --}}
    <x-promotion slug="top"></x-promotion>

    {{-- Slider --}}
    @include('frontend.sections.slider')

    {{-- Prices --}}
    @include('frontend.sections.prices')

    {{-- Promotion middle --}}
    <x-promotion slug="middle"></x-promotion>

    {{-- Service washes --}}
    @include('frontend.sections.serviceWashes')

    {{-- Promotion bottom --}}
    <x-promotion slug="bottom"></x-promotion>

    {{-- Find us --}}
    @include('frontend.sections.findUs')

@endsection
