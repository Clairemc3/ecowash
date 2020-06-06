@extends('layouts.backend')

@section('title', 'Machines')

@section('content')
    <h1>Invite a new user</h1>

    <x-form action="{{ route('admin.user.invitation.store')}}">
        <div class="my-6">
            <p>The user will be sent an email invitation to register with the application</p>
        </div>
        @include('backend.partials.userFormFields')
        <div class="button-group">
            <button type="submit" class="btn btn-teal">Submit</button>
            <button class="btn btn-white"> <a href="{{route('admin.user.index')}}">Cancel</a></button>
        </div>
    </x-form>
@endSection
