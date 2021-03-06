{{-- <li class="relative"> --}}
    <dropdown align="right" width="100%">
        <template v-slot:trigger>
                <button>
                    Logged in as {{ Auth::user()->name }} <span class="ml-2">@caret</span>
                </button>
        </template>

        @if (request()->is('admin/*'))
            <a href="/" class="dropdown-menu-link">View frontend</a>
        @else
            <a href="/admin/machines" class="dropdown-menu-link">Admin</a>
        @endif

        <form class="form__logout" id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="dropdown-menu-link">Logout</button>
        </form>
    </dropdown>
{{-- </li> --}}