<x-layouts.layout>
    @guest
    @endguest

    @auth
        <div style="margin-left: 20px" class="card bg-base-100 w-96 shadow-sm mt-4">
            <figure>
                <img
                    src="{{asset('images/kids.jpg')}}"
                    alt="kids" />
            </figure>
            <div class="card-body">
                <h2 class="card-title">{{ __('app.gestion-alumnos') }}</h2>
                <p>{{ __('app.dar-alta-gestionar') }}</p>
                <div class="card-actions justify-end">
                    <a href="{{ route('alumnos.index') }}" class="btn btn-primary">{{ __('app.accede-ahora') }}</a>
                </div>
            </div>
        </div>
    @endauth
</x-layouts.layout>
