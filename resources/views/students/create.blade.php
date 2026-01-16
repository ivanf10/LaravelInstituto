<x-layouts.layout>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="pt-4">

        @auth

            <div class="max-w-xl mx-auto mt-6 card bg-base-100 shadow-md">
                <div class="card-body">

                    <h2 class="card-title text-2xl mb-2">
                        {{ __('app.create_student_title') }}
                    </h2>

                    <p class="mb-4 text-gray-700">
                        {{ __('app.create_student_desc') }}
                    </p>

                    <form id="crearAlumnoForm"
                          action="{{ route('students.store') }}"
                          method="POST">
                        @csrf

                        <div class="form-control mb-3">
                            <label class="label">
                                <span class="label-text font-semibold">
                                    {{ __('app.columns.name') }}
                                </span>
                            </label>
                            <input type="text"
                                   name="name"
                                   class="input input-bordered"
                                   required>
                        </div>

                        <div class="form-control mb-3">
                            <label class="label">
                                <span class="label-text font-semibold">
                                    {{ __('app.columns.email') }}
                                </span>
                            </label>
                            <input type="email"
                                   name="email"
                                   class="input input-bordered"
                                   required>
                        </div>

                        <div class="form-control mb-3">
                            <label class="label">
                                <span class="label-text font-semibold">
                                    {{ __('app.password') }}
                                </span>
                            </label>
                            <input type="password"
                                   name="password"
                                   class="input input-bordered"
                                   required>
                        </div>

                        <div class="card-actions justify-end mt-4 space-x-2">
                            <a href="{{ route('students.index') }}"
                               class="btn btn-ghost">
                                {{ __('app.cancel') }}
                            </a>

                            <button type="button"
                                    id="btnGuardar"
                                    class="btn btn-primary">
                                {{ __('app.save') }}
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        @endauth

        @guest
            <div class="alert alert-warning shadow-lg mt-6 mx-auto w-fit">
                <div>
                    <span>{{ __('app.login_required_create') }}</span>
                </div>
            </div>
        @endguest

    </div>

    <script>
        document.getElementById("btnGuardar").addEventListener("click", function () {
            Swal.fire({
                title: "{{ __('app.swal_create_title') }}",
                text: "{{ __('app.swal_create_text') }}",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "{{ __('app.swal_confirm') }}",
                cancelButtonText: "{{ __('app.swal_cancel') }}"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("crearAlumnoForm").submit();
                }
            });
        });
    </script>

</x-layouts.layout>