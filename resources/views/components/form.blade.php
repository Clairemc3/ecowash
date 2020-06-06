
<x-card>

        @if ($errors->any())
            <div class="pt-10">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form action={{ $action }} method="{{ $method === 'PUT' ? 'POST' : $method }}">
            @csrf
            @method($method)
            {{ $slot }}

          </form>

</x-card>
