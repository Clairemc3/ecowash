@extends('layouts.backend')

@section('title', 'Machines')

@section('content')

{{-- Resource index header --}}
@resourceIndexHeader([
    'title' => 'Machines',
    'createRoute' => route('admin.machine.create'),
    'addResourceText' => 'Add a machine'])


@if ($machines->isEmpty())
    <p> You have no machines.</p>
    <p>Please add a machine with price details</p>
@else
@resourceTable([
    'includeActions' => true,
    'headings' => ['Name', 'Price'],
    'models' => $machines,
    'properties' => ['name', 'price']]),
@endif

<modal open-on-load="true">
    <h1 class="font-bold">Leaving so soon</h1>

    <p>Why not stay a bit longer?</p>

    <template v-slot:footer>
        <div class="button-group">
            <a class= "btn btn-teal" href="www.somthing.com">Continue</a>
            <button @click=$modal.close() class= "btn btn-teal">Cancel</button>
        </div>
    </template>

    </modal>

@endSection
