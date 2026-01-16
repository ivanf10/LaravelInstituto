<header class="relative w-full h-24 flex-shrink-0">

    <div class="absolute inset-0">
        <img src="/images/fondo_header.png" class="w-full h-full object-cover" alt="header background">
    </div>

    <div class="absolute inset-0 bg-blue-900 bg-opacity-80"></div>

    <div class="relative z-10 container mx-auto h-full flex justify-between items-center px-4">

        <div class="flex items-center space-x-3">
            <img src="/images/logo.png" class="h-20 w-auto object-contain">

            <span class="text-2xl font-bold tracking-wide text-white leading-none">
                {{ __('app.school_management') }}
            </span>
        </div>

        <div class="flex items-center space-x-3 text-white">

        @php
            $currentLocale = app()->getLocale();
            $currentLanguage = config('languages')[$currentLocale];
        @endphp

        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-sm btn-primary flex items-center gap-2">
                <span class="text-base">{{ $currentLanguage['flag'] }}</span>
                <span class="text-base">{{ $currentLanguage['name'] }}</span>
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 9l-7 7-7-7" />
                </svg>
            </label>

            <ul tabindex="0"
                class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-40 text-black">
                @foreach (config('languages') as $locale => $data)
                    <li>
                        <a href="{{ route('lang.switch', $locale) }}"
                        class="flex items-center gap-2
                                {{ $currentLocale === $locale ? 'font-bold' : '' }}">
                            <span>{{ $data['flag'] }}</span>
                            <span>{{ $data['name'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

            @guest
                <a href="/login">
                    <button class="btn btn-primary">{{ __('app.login') }}</button>
                </a>
                <a href="/register">
                    <button class="btn btn-primary">{{ __('app.register') }}</button>
                </a>
            @endguest

            @auth
                <span class="text-white font-semibold">
                {{ Auth::user()->name }}
                </span>

                @role('admin')
                    <span class="text-sm text-red-300">
                        {{ __('actions.admin') }}
                    </span>
                @endrole

                @role('teacher')
                    <span class="text-sm text-green-300">
                        {{ __('app.teacher') }}
                    </span>
                @endrole

                @role('student')
                    <span class="text-sm text-blue-300">
                        {{ __('app.student') }}
                    </span>
                @endrole

                <button class="btn btn-primary"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </button>

                <form id="logout-form" 
                      action="{{ route('logout') }}" 
                      method="POST" 
                      class="hidden">
                    @csrf
                </form>
            @endauth

        </div>

    </div>

</header>
