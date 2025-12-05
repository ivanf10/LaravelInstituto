<x-layouts.layout>

    <div class="flex items-center space-x-3 mb-4 px-4 mt-4">
    <!-- ↑↑ AÑADIDO mt-4 ↑↑ -->

        <!-- Botón Crear alumno -->
        <a href="{{ route('alumnos.create') }}">
            <button class="px-4 py-2 bg-pink-500 text-white font-semibold rounded shadow hover:bg-pink-400">
                Crear alumno
            </button>
        </a>

        <!-- Botón Volver -->
        <a href="/">
            <button class="px-4 py-2 bg-gray-300 text-black font-semibold rounded shadow hover:bg-gray-200">
                Volver
            </button>
        </a>

    </div>

    <h1 class="text-2xl font-bold mb-4">Listado de Alumnos</h1>

    <table class="table-auto w-full border-collapse border border-gray-400">
        <thead>
            <tr>
                @foreach ($campos as $campo)
                    <th class="border px-4 py-2">{{ $campo }}</th>
                @endforeach
            </tr>
        </thead>

        <tbody>
            @foreach ($alumnos as $alumno)
                <tr>
                    <td class="border px-4 py-2">{{ $alumno->id }}</td>
                    <td class="border px-4 py-2">{{ $alumno->nombre }}</td>
                    <td class="border px-4 py-2">{{ $alumno->apellido }}</td>
                    <td class="border px-4 py-2">{{ $alumno->email }}</td>
                    <td class="border px-4 py-2">{{ $alumno->fecha_nacimiento }}</td>
                    <td class="border px-4 py-2">{{ $alumno->updated_at }}</td>
                    <td class="border px-4 py-2">{{ $alumno->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</x-layouts.layout>
