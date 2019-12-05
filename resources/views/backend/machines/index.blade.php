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
    'properties' => ['name', 'price']])
@endif


{{-- <h2>Regular modal</h2> --}}


<modal open-on-load="true">

<h1 class="font-bold">Leaving so soon</h1>

<p>gbrfgrudfje rgvrhy</p>

<template v-slot:footer>
    <div class="button-group">
        <a class= "btn btn-teal" href="www.somthing.com">Continue</a>
        <button @click=$modal.close() class= "btn btn-teal">Cancel</button>
    </div>
</template>

</modal>


{{-- <modal>
        <template v-slot:trigger>
            <a @click.prevent href="#">Click this</a>
        </template>
        <h1 class="font-bold">Second one</h1>

        <p>gbrfgrudfje rgvrhy</p>
        <p>ghtjr</p>

        <template v-slot:footer>
            <div class="button-group">
                <a class= "btn btn-teal" href="www.somthing.com">Continue</a>
                <button @click=$modal.close() class= "btn btn-teal">Cancel</button>
            </div>
        </template>

</modal> --}}



<h2>Confirm dialog</h2>

<confirm-dialog>
        <template v-slot:trigger>
                <button>
                    Modal 1
                </button>
            </template>
</confirm-dialog>

{{-- <h2>Confirm Button</h2>

<form method="POST">
    <confirm-button
        message = "Are you sure you want to delete this item?"
        cancel-button = "Dont delete it"
        proceed-button = "Yes, delete it"
        class="btn btn-teal">Submit
    </confirm-button>
</form> --}}



@endSection
