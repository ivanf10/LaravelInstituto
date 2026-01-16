<x-layouts.layout>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- ICONOS PARA ACCIONES --}}
    @php

    $borrar_icono = <<<SVG
    <svg xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        fill="currentColor"
        class="w-5 h-5">
        <path fill-rule="evenodd"
            d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512
                .75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07
                a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77
                L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478
                A48.567 48.567 0 0 1 7.5 4.705v-.227
                c0-1.564 1.213-2.9 2.816-2.951
                a52.662 52.662 0 0 1 3.369 0
                c1.603.051 2.815 1.387 2.815 2.951Zm
                -6.136-1.452a51.196 51.196 0 0 1 3.273 0
                C14.39 3.05 15 3.684 15 4.478v.113
                a49.488 49.488 0 0 0-6 0v-.113
                c0-.794.609-1.428 1.364-1.452Zm
                -.355 5.945a.75.75 0 1 0-1.5.058l.347 9
                a.75.75 0 1 0 1.499-.058l-.346-9Zm
                5.48.058a.75.75 0 1 0-1.498-.058l-.347 9
                a.75.75 0 0 0 1.5.058l.345-9Z"
            clip-rule="evenodd"/>
    </svg>
    SVG;

    $editar_icono = <<<SVG
    <svg xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        fill="currentColor"
        class="w-5 h-5">
        <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0
                l-1.157 1.157 3.712 3.712 1.157-1.157
                a2.625 2.625 0 0 0 0-3.712Z"/>
        <path d="M19.513 8.199l-3.712-3.712-8.4 8.4
                a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685
                a.75.75 0 0 0 .933.933l2.685-.8
                a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z"/>
        <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5
                a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5
                a.75.75 0 0 0-1.5 0v5.25
                a1.5 1.5 0 0 1-1.5 1.5H5.25
                a1.5 1.5 0 0 1-1.5-1.5V8.25
                a1.5 1.5 0 0 1 1.5-1.5h5.25
                a.75.75 0 0 0 0-1.5H5.25Z"/>
    </svg>
    SVG;

    @endphp


    {{-- BOTONES --}}
    <div class="flex items-center space-x-3 mb-4 px-4">
        @role('admin')
            <a href="{{ route('students.create') }}">
                <button class="px-4 py-2 bg-pink-500 text-white font-semibold rounded shadow hover:bg-pink-400">
                    {{ __('app.create_student') }}
                </button>
            </a>
        @endrole
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

        @php
        $canManageStudents = auth()->check() && auth()->user()->hasAnyRole(['admin', 'teacher']);
        @endphp
        
        <table class="table-auto w-full border-collapse border border-gray-400"> 
            <thead>
                <tr>
                    @foreach ($campos as $campo)
                        <th class="border px-4 py-2">
                            {{ __('app.columns.' . $campo) }}
                        </th>
                    @endforeach

                    @if ($canManageStudents)
                        <th class="border px-4 py-2">
                            {{ __('app.actions') }}
                        </th>
                    @endif
                </tr>
            </thead>
            
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td class="border px-4 py-2">{{ $student->id }}</td>
                        <td class="border px-4 py-2">{{ $student->name }}</td>
                        <td class="border px-4 py-2">{{ $student->email }}</td>
                        <td class="border px-4 py-2">{{ $student->created_at }}</td>
                        <td class="border px-4 py-2">{{ $student->updated_at }}</td>

                        @if ($canManageStudents)
                            <td class="border px-4 py-2">
                                <div class="flex justify-center space-x-2">

                                    <a href="{{ route('students.edit', $student->id) }}"
                                    class="p-2 bg-blue-500 hover:bg-blue-600 text-white rounded"
                                    title="{{ __('app.edit') }}">
                                        {!! $editar_icono !!}
                                    </a>

                                    <form action="{{ route('students.destroy', $student->id) }}"
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
                        @endif
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
