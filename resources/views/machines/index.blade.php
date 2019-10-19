<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Machines</h1>

<ul>
    @forelse ($machines as $machine)
        <li>
            <a href="{{ $machine->path() }}">{{ $machine->name }}</a>
        </li>
    @empty
        <li>No machines here. Please add one.</li>    
    @endforelse
</ul>
    
</body>
</html>