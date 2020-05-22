@extends('layouts.backend')

@section('title', 'Machines')

@section('content')

   <x-card-group>

      <x-card link="{{ route('admin.promotion.index') }}">
         <x-slot name="heading">
            Manage promotions
         </x-slot>
         <p> View, and and edit promotional slots.</p>
      </x-card>


      <x-card link="{{ route('admin.slider.index') }}">
         <x-slot name="heading">
            Manage sliders
         </x-slot>
         <p> View, edit and add slider images and content.</p>
      </x-card>

      <x-card link="{{ route('admin.alert.index') }}">
         <x-slot name="heading">
            Manage alerts
         </x-slot>
        <p>Alerts can be added to let your customers know if you will be closing or if you have changed hours</p>
      </x-card>

      <x-card link="{{ route('admin.machine.index') }}">
         <x-slot name="heading">
            Manage machines
         </x-slot>
         <p>Add and edit existing machines, including descriptions and prices.</p>
      </x-card>

      <x-card link="{{ route('admin.content.index') }}">
         <x-slot name="heading">
            Manage content
         </x-slot>
         <p> Edit content and add to content body.</p>
      </x-card>

   </x-card-group>

@endSection
