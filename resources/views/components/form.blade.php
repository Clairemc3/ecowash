<div class="bg-white rounded">
    <form action={{ $action }} method="{{ $method === 'PUT' ? 'POST' : $method }}" class="p-8">
        @csrf
        @method($method)
        {{ $slot }}

      </form>
  </div>
