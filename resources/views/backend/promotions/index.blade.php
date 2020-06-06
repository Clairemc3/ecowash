@extends('layouts.backend')

@section('title', 'Promotions')

@section('content')

{{-- Resource index header --}}
@resourceIndexHeader([
    'modelClass' => App\Promotion::class,
    'title' => 'Promotions',
    'createRoute' => route('admin.promotion.create'),
    'addResourceText' => 'Add a promotion block'])


@if ($promotions->isEmpty())
    <p>There are no promotional blocks</p>
@else
    <x-table.table>
        <x-table.head :headings="['Name']">
            <x-slot name="after">
                <x-table.cell type="heading"></x-table.cell>
                <x-table.cell type="heading"></x-table.cell>
            </x-slot>
        </x-table.head>

        <x-table.body>
            @foreach($promotions as $promotion)
                <x-table.row :class="!$promotion->active ? 'text-gray-500' : ''">
                    <x-table.cell>{{ $promotion->name }} </x-table.cell>
                    <x-table.cell
                            class="text-center">
                            @if ($promotion->active)
                                <x-active-flag/>
                            @endif
                    </x-table.cell>

                    <x-table.actions :model="$promotion"></x-table.actions>
                </x-table.row>
            @endforeach
        </x-table.body>
    </x-table.table>
@endif

@endSection
