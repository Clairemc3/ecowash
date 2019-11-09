<li class="relative">
    {{-- <a id="navbarDropdown" class="px-2 dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
    Logged in as {{ Auth::user()->name }} <span class="caret"></span>
    </a> --}}
    <a id="navbarDropdown" class="js-toggle whitespace-no-wrap" href="#" role="button" data-toggleTarget="#logout-link">
            Logged in as {{ Auth::user()->name }} <span>@caret</span>
    </a>

    <div class="hidden right-0 left-auto border-none absolute bg-yellow" id="logout-link">
        <a class="dropdown-item hover:bg-black hover:text-white py-2 px-4 w-full block" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
         </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    </div>
</li>