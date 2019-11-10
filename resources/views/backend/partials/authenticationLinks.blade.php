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
        <a href="" class="dropdown-menu-link">Logout</a>
    </dropdown>
{{-- </li> --}}