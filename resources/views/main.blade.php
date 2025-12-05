<x-layouts.layout>
    @guest
    @endguest

    @auth
        <div style="margin-left: 20px" class="card bg-base-100 w-96 shadow-sm">
            <figure>
                <img
                    src="{{asset('images/kids.jpg')}}"
                    alt="kids" />
            </figure>
            <div class="card-body">
                <h2 class="card-title">Gestion Alumnos</h2>
                <p>Dar de alta y gestionar alumnos</p>
                <div class="card-actions justify-end">
                    <a href="{{ route('alumnos.index') }}" class="btn btn-primary">Accede ahora</a>
                </div>
            </div>
        </div>
    @endauth
</x-layouts.layout>
