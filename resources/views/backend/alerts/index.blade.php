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
@include('backend.tables.resourceTable', [
    'includeActions' => true,
    'headings' => ['Summary', 'Start date', 'End date', 'Is active'],
    'models' => $alerts,
    'properties' => ['short_text', 'startDateString', 'endDateString', 'isActive'],
    'propertyClass' => ['isActive' => 'text-red'],
])
@endif

@endSection
