<header class="relative h-24 w-full overflow-hidden">

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
        @endphp

        <div class="flex gap-2">
            @foreach (config('languages') as $locale => $data)
                <a href="{{ route('lang.switch', $locale) }}"
                class="btn btn-sm btn-primary flex items-center gap-1
                        {{ $currentLocale === $locale ? 'text-black' : 'text-white' }}">
                    
                    <span class="text-base leading-none">
                        {{ $data['flag'] }}
                    </span>

                    <span class="text-base">
                        {{ $data['name'] }}
                    </span>

                </a>
            @endforeach
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
                    <span class="text-sm text-red-300">{{ __('app.teacher') }}</span>
                @endrole

                @role('teacher')
                    <span class="text-sm text-green-300">{{ __('actions.admin') }}</span>
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
