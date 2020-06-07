@extends('layouts.backend')

@section('title', 'Activate your account')

@section('content')
    <h1>Activate your account</h1>

    <div class=my-2>
        <p>After activating your account, you will have access to the Ecowash admin where you can manage the content for the website.</p>
    </div>


  <x-form action="{{route('activation.activate', ['token'=> $token, 'email' => $email])}}" method="POST">

            <x-inputs.password></x-inputs.password>
            <div class="button-group">
                <button type="submit" class="btn btn-teal">Submit</button>
                <button class="btn btn-white"> <a href="{{route('admin.alert.index')}}">Cancel</a></button>
            </div>
  </x-form>
@endSection