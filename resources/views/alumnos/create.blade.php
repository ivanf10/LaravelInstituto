<x-layouts.layout>

    <div class="pt-4">

        @auth

            <div class="max-w-xl mx-auto mt-6 card bg-base-100 shadow-md">

                <div class="card-body">

                    <h2 class="card-title text-2xl mb-2">Crear Alumno</h2>
                    <p class="mb-4 text-gray-700">Introduce los datos del nuevo alumno.</p>

                    <form action="{{ route('alumnos.store') }}" method="POST">
                        @csrf

                        <!-- NOMBRE -->
                        <div class="form-control mb-3">
                            <label class="label">
                                <span class="label-text font-semibold">Nombre</span>
                            </label>
                            <input type="text" name="nombre" class="input input-bordered" required>
                        </div>

                        <!-- APELLIDO -->
                        <div class="form-control mb-3">
                            <label class="label">
                                <span class="label-text font-semibold">Apellido</span>
                            </label>
                            <input type="text" name="apellido" class="input input-bordered" required>
                        </div>

                        <!-- EMAIL -->
                        <div class="form-control mb-3">
                            <label class="label">
                                <span class="label-text font-semibold">Email</span>
                            </label>
                            <input type="email" name="email" class="input input-bordered" required>
                        </div>

                        <!-- FECHA NACIMIENTO -->
                        <div class="form-control mb-3">
                            <label class="label">
                                <span class="label-text font-semibold">Fecha de nacimiento</span>
                            </label>
                            <input type="date" name="fecha_nacimiento" class="input input-bordered" required>
                        </div>

                        <div class="card-actions justify-end mt-4 space-x-2">
                            <a href="{{ route('alumnos.index') }}" class="btn btn-ghost">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>

                    </form>

                </div>
            </div>

        @endauth

        @guest
            <div class="alert alert-warning shadow-lg mt-6 mx-auto w-fit">
                <div>
                    <span>Debes iniciar sesión para crear alumnos.</span>
                </div>
            </div>
        @endguest

    </div>

</x-layouts.layout>