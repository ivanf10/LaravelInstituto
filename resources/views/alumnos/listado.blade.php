<x-layouts.layout>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- ICONOS PARA ACCIONES --}}
    @php
    $borrar_icono = <<<SVG
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
      <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
    </svg>
    SVG;

    $editar_icono = <<<SVG
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
      <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
      <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
    </svg>
    SVG;
    @endphp


    {{-- ZONA DE BOTONES --}}
    <div class="flex items-center space-x-3 mb-4 px-4">
        <a href="{{ route('alumnos.create') }}">
            <button class="px-4 py-2 bg-pink-500 text-white font-semibold rounded shadow hover:bg-pink-400">
                {{ __('app.create_student') }}
            </button>
        </a>

        <a href="/">
            <button class="px-4 py-2 bg-gray-300 text-black font-semibold rounded shadow hover:bg-gray-200">
                {{ __('app.back') }}
            </button>
        </a>
    </div>


    <h1 class="text-2xl font-bold mb-4 px-4">
        {{ __('app.students_list') }}
    </h1>


    {{-- TABLA --}}
    <div class="overflow-y-auto h-full pr-4">

        <table class="table-auto w-full border-collapse border border-gray-400">
            <thead>
                <tr>
                    @foreach ($campos as $campo)
                        <th class="border px-4 py-2">
                            {{ __('app.columns.' . $campo) }}
                        </th>
                    @endforeach
                    <th class="border px-4 py-2">{{ __('app.actions') }}</th>
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

                        <td class="border px-4 py-2">
                            <div class="flex justify-center space-x-2">

                                <!-- EDITAR -->
                                <a href="{{ route('alumnos.edit', $alumno->id) }}"
                                   class="p-2 bg-blue-500 hover:bg-blue-600 text-white rounded"
                                   title="{{ __('app.edit') }}">
                                    {!! $editar_icono !!}
                                </a>

                                <!-- BORRAR -->
                                <form action="{{ route('alumnos.destroy', $alumno->id) }}"
                                      method="POST"
                                      class="form-delete">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="p-2 bg-red-500 hover:bg-red-600 text-white rounded"
                                            title="{{ __('app.delete') }}">
                                        {!! $borrar_icono !!}
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>


    {{-- SWEETALERT --}}
    <script>
        document.querySelectorAll('.form-delete').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: "{{ __('app.swal_delete_title') }}",
                    text: "{{ __('app.swal_delete_text') }}",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "{{ __('app.swal_confirm') }}",
                    cancelButtonText: "{{ __('app.swal_cancel') }}"
                }).then(result => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>

</x-layouts.layout>
