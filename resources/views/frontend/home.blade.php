@extends('layouts.frontend')


@section('title', 'Laundertte in Godalming')

@section('mainMenu')
    @parent
@endsection


@section('content')

    @if ($alert)

    <modal open-on-load="true" disable-scroll="true">
        <h1>{{$alert->short_text}}</h1>

        {!!$alert->long_text!!}

        <template v-slot:footer>
            <div class="button-group">
                <button @click=$modal.close() class= "btn btn-teal">Okay</button>
            </div>
        </template>

        </modal>
    @endif

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
