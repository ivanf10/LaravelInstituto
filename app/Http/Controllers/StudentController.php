<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Mostrar listado de alumnos.
     */
    public function index()
    {
        $students = User::role('student')->get();

        // Columnas que quieres mostrar
        $campos = [
            'id',
            'name',
            'email',
            'created_at',
            'updated_at',
        ];

        return view('students.listado', compact('students', 'campos'));
    }

    /**
     * Mostrar formulario para crear un alumno.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Guardar alumno nuevo.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $student = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Asignar rol student
        $student->assignRole('student');

        return redirect()
            ->route('students.index')
            ->with('success', 'Alumno creado correctamente');
    }

    /**
     * Mostrar formulario para editar un alumno.
     */
    public function edit(User $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Actualizar alumno.
     */
    public function update(Request $request, User $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $student->id,
            'password' => 'nullable|min:8',
        ]);

        $student->name = $request->name;
        $student->email = $request->email;

        if ($request->filled('password')) {
            $student->password = Hash::make($request->password);
        }

        $student->save();

        return redirect()
            ->route('students.index')
            ->with('success', 'Alumno actualizado correctamente');
    }

    /**
     * Eliminar alumno.
     */
    public function destroy(User $student)
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Alumno eliminado correctamente');
    }
}
