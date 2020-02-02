@extends('layouts.frontend')


@section('title', 'Laundertte in Godalming')

@section('mainMenu')
    @parent
@endsection

@section('content')




    {{-- Slider --}}
    @include('frontend.sections.slider')

    {{-- Prices --}}
    @include('frontend.sections.prices')

    {{-- Promotion 1 --}}
    @include('frontend.sections.promotion')

    {{-- Service washes --}}
    @include('frontend.sections.serviceWashes')

    {{-- Promotion 2 --}}
    @include('frontend.sections.promotion2')

    {{-- Find us --}}
    @include('frontend.sections.findUs')

@endsection
