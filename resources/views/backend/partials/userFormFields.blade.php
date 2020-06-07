<x-inputs.text
        label="Name"
        name="name"
        value="{{ old('slug', $user->name ?? '') }}"/>

<x-inputs.email
        label="Email address"
        name="email"
        value="{{ old('slug', $user->email ?? '') }}"/>

