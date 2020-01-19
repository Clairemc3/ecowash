@extends('layouts.backend')

@section('title', 'Alerts')

@section('content')

{{-- Resource index header --}}
@resourceIndexHeader([
    'title' => 'Alerts',
    'createRoute' => route('admin.alert.create'),
    'addResourceText' => 'Add an alert'])

<div class=my-2>
    <p>Add alerts to display on your website here.</p>
    <ul>
        <li>
            A box showing the summary content will be displayed whilst the alert is active
        </li>
        <li>A pop up box showing the detailed alert message will display once for every website visitor.

        </li>
    </ul>
    <p class="font-bold">Please note, only one alert can be active on any given day.</p>
</div>

@if ($alerts->isEmpty())
    <p>No alerts</p>
@else
    @tbl
        @tblHead([
            'headings' => ['Summary', 'Start date', 'End date'],
        ])
            @slot('after')
                @cell(['heading']) @endcell
                @cell(['heading', 'class' => 'hidden sm:table-cell']) @endcell
            @endslot
        @endtblHead

        @tblBody
            @foreach($alerts as $alert)
                @tblRow
                    @cell {{ $alert->short_text }} @endcell
                    @cell {{ $alert->startDateString  }} @endcell
                    @cell {{ $alert->endDateString  }} @endcell

                    @cell(['class' => 'text-center hidden sm:table-cell'])
                        @if (!$alert->isActive())
                            <div class="bg-green-500 text-white text-sm rounded-full p-0">
                                active
                            </div>
                        @endif
                    @endcell

                    @tblActions(['model' => $alert])@endtblActions
                @endtblRow
            @endforeach
        @endtblBody
    @endtbl

@endif

@endSection
