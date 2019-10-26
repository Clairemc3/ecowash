<nav class="navbar navbar-expand-md bg-yellow shadow-small admin-font-family">
        <div class="container md:flex flex-row justify-between">
            <a class="text-grey-900 inline-block text-lg" href="{{ url('/admin') }}">
                {{ config('app.name', 'Ecowash') . ' admin' }}
            </a>
            @if ($withoutMenu ?? false)
                @authenticationLinks
            @else
                <button class="md:invisible" id="menuToggle" type="button" data-toggle="collapse" data-target="#navBarToggleable">
                    <span class="outline-none">
                        @hamburger
                    </span>
                </button>

                <div class="collapse navbar-collapse " id="navBarToggleable">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="text-grey-400 navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="">
                                <a class="px-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @else
                            <li class="">
                            <a class="px-2" href="{{ route('admin.machine.index') }}">Machines</a>
                            </li>
                            <li class="">
                                <a class="px-2" href="{{ route('home') }}">View front end</a>
                            </li>
                            @authenticationLinks
                            @endguest

                    </ul>
                </div>
            @endif
        </div>
    </nav>
</div>