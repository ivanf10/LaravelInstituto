<x-layouts.layout>

    {{-- Cargar SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="pt-4">

        @auth

            <div class="max-w-xl mx-auto mt-6 card bg-base-100 shadow-md">

                <div class="card-body">

                    <h2 class="card-title text-2xl mb-2">Editar Alumno</h2>
                    <p class="mb-4 text-gray-700">Modifica los datos del alumno.</p>

                    {{-- FORMULARIO --}}
                    <form id="editAlumnoForm" action="{{ route('alumnos.update', $alumno->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- NOMBRE -->
                        <div class="form-control mb-3">
                            <label class="label">
                                <span class="label-text font-semibold">Nombre</span>
                            </label>
                            <input type="text"
                                   name="nombre"
                                   class="input input-bordered"
                                   value="{{ old('nombre', $alumno->nombre) }}"
                                   required>
                        </div>

                        <!-- APELLIDO -->
                        <div class="form-control mb-3">
                            <label class="label">
                                <span class="label-text font-semibold">Apellido</span>
                            </label>
                            <input type="text"
                                   name="apellido"
                                   class="input input-bordered"
                                   value="{{ old('apellido', $alumno->apellido) }}"
                                   required>
                        </div>

                        <!-- EMAIL -->
                        <div class="form-control mb-3">
                            <label class="label">
                                <span class="label-text font-semibold">Email</span>
                            </label>
                            <input type="email"
                                   name="email"
                                   class="input input-bordered"
                                   value="{{ old('email', $alumno->email) }}"
                                   required>
                        </div>

                        <!-- FECHA NACIMIENTO -->
                        <div class="form-control mb-3">
                            <label class="label">
                                <span class="label-text font-semibold">Fecha de nacimiento</span>
                            </label>
                            <input type="date"
                                   name="fecha_nacimiento"
                                   class="input input-bordered"
                                   value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento) }}"
                                   required>
                        </div>

                        <div class="card-actions justify-end mt-4 space-x-2">
                            <a href="{{ route('alumnos.index') }}" class="btn btn-ghost">Cancelar</a>

                            <!-- BOTÓN SweetAlert2 -->
                            <button type="button" id="btnGuardarCambios" class="btn btn-primary">
                                Guardar cambios
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        @endauth


        @guest
            <div class="alert alert-warning shadow-lg mt-6 mx-auto w-fit">
                <div>
                    <span>Debes iniciar sesión para editar alumnos.</span>
                </div>
            </div>
        @endguest

    </div>

    {{-- SCRIPT SweetAlert2 --}}
    <script>
        document.getElementById("btnGuardarCambios").addEventListener("click", function () {

            Swal.fire({
                title: "¿Guardar cambios?",
                text: "Se actualizará la información del alumno.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Cancelar",
                confirmButtonText: "Sí, guardar"
            }).then((result) => {
                if (result.isConfirmed) {

                    // Enviar formulario REAL
                    document.getElementById("editAlumnoForm").submit();
                }
            });

        });
    </script>

</x-layouts.layout>
