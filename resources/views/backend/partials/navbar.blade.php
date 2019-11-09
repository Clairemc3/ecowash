<nav class="bg-yellow-bright shadow-small admin-font-family relative flex flex-wrap items-center md:flex-row md:justify-start py-2 px-4">
        <div class="container flex flex-row justify-between">
            <a class="text-grey-900 inline-block text-lg" href="{{ url('/admin') }}">
                {{ config('app.name', 'Ecowash') . ' admin' }}
            </a>
            @if ($withoutMenu ?? false)
            <ul class="md:flex text-grey-400 ml-auto list-none text-base">
                @authenticationLinks
            </ul>
            @else
                <button class="md:invisible" id="menuToggle" type="button" data-toggle="collapse" data-target="#navBarToggleable">
                    <span class="outline-none">
                        @hamburger
                    </span>
                </button>

                <div class="md:flex collapse" id="navBarToggleable">
                    <!-- Left Side Of Navbar -->
                    <ul class="md:flex mr-auto list-none text-base">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="md:flex text-grey-400 navbar-nav ml-auto text-base">
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