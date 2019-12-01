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


<h2>Regular modal</h2>

<p>
    <a href="#cancel">Open Modal</a>
</p>


<modal :open="modalOpen" name="cancel">
<h1 class="font-bold">Leaving so soon</h1>

<p>gbrfgrudfje rgvrhy</p>

<template v-slot:footer>
    <div class="button-group">
        {{-- <a class= "btn btn-teal" href="#">Continue</a>
        <button @click=$modal.close('cancel') class= "btn btn-teal">Cancel</button> --}}
        <button @click="$modal.shut()" class="btn btn-teal">Change the prop</button>
    </div>
</template>

</modal>



<h2>Confirm dialog</h2>

<confirm-dialog>
</confirm-dialog>



@endSection