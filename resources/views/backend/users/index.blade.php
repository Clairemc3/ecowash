@extends('layouts.backend')

@section('title', 'Users')

@section('content')

    {{-- Resource index header --}}
    @resourceIndexHeader([
    'modelClass' => App\User::class,
    'title' => 'Users',
    'createRoute' => route('admin.user.invitation'),
    'addResourceText' => 'Add a new user'])


    @if ($users->isEmpty())
        <p>There are no users</p>
    @else
        <x-table.table>
            <x-table.head :headings="['Name', 'Email', 'Status', 'Roles']">
                <x-slot name="after">
                    <x-table.cell type="heading"></x-table.cell>
                </x-slot>
            </x-table.head>

            <x-table.body>
                @foreach($users as $user)
                    <x-table.row>
                        <x-table.cell>{{ $user->name }} </x-table.cell>
                        <x-table.cell>{{ $user->email }} </x-table.cell>
                        <x-table.cell>
                            @if ($user->status === \App\UserStatus::INVITED)
                                <form method="POST" action="{{ route('admin.user.invitation.resend', ['user' => $user ])}}" class="inline-block">
                                    @csrf
                                    <confirm-button
                                            message="Are you sure you want to resend this users invitation?">
                                        <button class="btn btn-teal"> Resend invitation</button>

                                    </confirm-button>
                                </form>
                                <confirm-dialog></confirm-dialog>
                            @else
                                {{ ucfirst($user->status) }}
                            @endif
                        </x-table.cell>
                        <x-table.cell>
                           @foreach( $user->roles as $role)
                                {{ $role->title }}
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </x-table.cell>
                        <x-table.actions :model="$user"></x-table.actions>
                    </x-table.row>
                @endforeach
            </x-table.body>
        </x-table.table>
    @endif

@endSection
