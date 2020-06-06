<x-inputs.text
        label="Name"
        name="name"
        value="{{ old('slug', $user->name ?? '') }}"/>

<x-inputs.email
        label="Email address"
        name="email"
        value="{{ old('slug', $user->email ?? '') }}"/>

@can('assign-roles')
<x-inputs.select name="role" label="Select a role for this user">
    <x-slot name="options">
            @foreach(App\Role::all() as $role)
                <x-inputs.option name=role :value="$role->id" :label="$role->name"/>
            @endforeach
    </x-slot>
</x-inputs.select>
 @endcan
