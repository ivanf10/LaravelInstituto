<x-layouts.layout>

    <div class="pt-4">
        <div class="max-w-xl mx-auto card bg-base-100 shadow-md">

            <div class="card-body">

                <h2 class="card-title text-2xl mb-4">
                    Detalle del alumno
                </h2>

                <p>
                    <strong>Nombre:</strong>
                    {{ $student->name }}
                </p>

                <p>
                    <strong>Email:</strong>
                    {{ $student->email }}
                </p>

                <p>
                    <strong>Rol:</strong>
                    {{ ucfirst($student->getRoleNames()->first()) }}
                </p>

                <p>
                    <strong>Fecha de alta:</strong>
                    {{ $student->created_at->format('d/m/Y') }}
                </p>

                <div class="mt-4 flex gap-2 justify-end">
                    <a href="{{ route('students.index') }}" class="btn btn-ghost">
                        Volver
                    </a>

                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">
                        Editar
                    </a>
                </div>

            </div>
        </div>
    </div>

</x-layouts.layout>
