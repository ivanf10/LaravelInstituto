<x-layouts.layout>

    <div class="pt-4">
        <div class="max-w-xl mx-auto card bg-base-100 shadow-md">
            <div class="card-body">
                <h2 class="card-title text-2xl mb-4">Detalle del alumno</h2>

                <p><strong>Nombre:</strong> {{ $alumno->nombre }}</p>
                <p><strong>Apellidos:</strong> {{ $alumno->apellidos }}</p>
                <p><strong>Email:</strong> {{ $alumno->email }}</p>
                <p><strong>DNI:</strong> {{ $alumno->dni }}</p>
                <p><strong>Fecha de nacimiento:</strong> {{ $alumno->f_nac }}</p>

                <div class="mt-4 flex gap-2 justify-end">
                    <a href="{{ route('alumnos.index') }}" class="btn btn-ghost">Volver</a>
                    <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-primary">Editar</a>
                </div>
            </div>
        </div>
    </div>

</x-layouts.layout>
