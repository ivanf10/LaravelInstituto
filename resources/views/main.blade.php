<x-layouts.layout>

    {{-- FONDO --}}
    <div class="absolute inset-0">
        <img
            src="{{ asset('images/fondo_home.jpg') }}"
            class="w-full h-full object-cover"
            alt="Background"
        >
        <div class="absolute inset-0 bg-black/60"></div>
    </div>

    {{-- CONTENIDO CENTRADO --}}
    <div class="absolute inset-0 flex items-center justify-center z-10">

        @guest
            <div class="text-center text-white max-w-xl px-4">

                <h1 class="text-5xl font-bold mb-6">
                    {{ __('app.learning_laravel') }}
                </h1>

                <p class="text-xl mb-3">
                    {{ __('app.tolearn_laravel') }}
                </p>

                <p class="mb-8 opacity-90">
                    {{ __('app.register_to_access') }}
                </p>

                <a href="{{ route('login') }}"
                   class="inline-block px-8 py-3 bg-purple-600 hover:bg-purple-700 rounded-lg font-semibold">
                    {{ __('app.login') }}
                </a>

            </div>
        @endguest

        @auth
            <div class="absolute left-6 top-1/2 -translate-y-1/2">
                <div class="card bg-base-100 w-96 shadow-lg">
                    <figure>
                        <img src="{{ asset('images/kids.jpg') }}" alt="kids">
                    </figure>

                    <div class="card-body">
                        <h2 class="card-title">
                            {{ __('app.gestion-alumnos') }}
                        </h2>

                        <p>{{ __('app.dar-alta-gestionar') }}</p>

                        <div class="card-actions justify-end">
                            <a href="{{ route('students.index') }}" class="btn btn-primary">
                                {{ __('app.accede-ahora') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endauth

    </div>

</x-layouts.layout>
