<header class="relative h-24 w-full overflow-hidden">

    <div class="absolute inset-0">
        <img src="/images/fondo_header.png" class="w-full h-full object-cover" alt="header background">
    </div>

    <div class="absolute inset-0 bg-blue-900 bg-opacity-80"></div>

    <div class="relative z-10 container mx-auto h-full flex justify-between items-center px-4">

        <div class="flex items-center space-x-3">
            <img src="/images/logo.png" class="h-20 w-auto object-contain">

            <span class="text-2xl font-bold tracking-wide text-white leading-none">
                SCHOOL MANAGEMENT
            </span>
        </div>

        <div class="flex items-center space-x-3 text-white">

            @guest
                <a href="/login">
                    <button class="btn btn-primary">Login</button>
                </a>
                <a href="/register">
                    <button class="btn btn-primary">Registrarse</button>
                </a>
            @endguest

            @auth
                <span class="text-white font-semibold">{{ Auth::user()->name }}</span>

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
