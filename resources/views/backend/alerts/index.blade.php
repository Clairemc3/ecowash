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
    <x-table.table>
        <x-table.head :headings="['Summary', 'Start date', 'End date']">
            <x-slot name="after">
                <x-table.cell type="heading"></x-table.cell>
                <x-table.cell type="heading" class="hidden sm:table-cell"></x-table.cell>
            </x-slot>
        </x-table.head>

        <x-table.body>
            @foreach($alerts as $alert)
                <x-table.row :class="$alert->isExpired() ? 'text-gray-500' : ''">
                    <x-table.cell>{{ $alert->short_text }} </x-table.cell>
                    <x-table.cell>{{ $alert->startDateString }} </x-table.cell>
                    <x-table.cell>{{ $alert->endDateString }} </x-table.cell>
                    <x-table.cell
                            class="text-center hidden sm:table-cell">
                        @if ($alert->isActive())
                            <div class="bg-green-500 text-white text-sm rounded-full p-0">
                                active
                            </div>
                        @endif
                    </x-table.cell>

                    <x-table.actions :model="$alert"></x-table.actions>
                </x-table.row>
            @endforeach
        </x-table.body>
    </x-table.table>

@endif

@endSection
