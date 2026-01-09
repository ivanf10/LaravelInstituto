<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Http\Requests\StorealumnoRequest;
use App\Http\Requests\UpdatealumnoRequest;
use Illuminate\Support\Facades\Schema;

class AlumnoController extends Controller
{
    /**
     * Mostrar listado de alumnos.
     */
    public function index()
    {
        $alumnos = Alumno::all();
        $campos = Schema::getColumnListing('alumnos');

        return view('alumnos.listado', [
            'alumnos' => $alumnos,
            'campos' => $campos
        ]);
    }

    /**
     * Mostrar formulario para crear un alumno.
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Guardar alumno nuevo en la base de datos.
     */
    public function store(StorealumnoRequest $request)
    {
        Alumno::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'fecha_nacimiento' => $request->fecha_nacimiento,
        ]);

        return redirect()
            ->route('alumnos.index')
            ->with('success', 'Alumno creado correctamente');
    }

    /**
     * Mostrar formulario para editar un alumno.
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Actualizar un alumno existente.
     */
    public function update(UpdatealumnoRequest $request, Alumno $alumno)
    {
        $alumno->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'fecha_nacimiento' => $request->fecha_nacimiento,
        ]);

        return redirect()
            ->route('alumnos.index')
            ->with('success', 'Alumno actualizado correctamente');
    }

    /**
     * Eliminar un alumno.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();

        return redirect()
            ->route('alumnos.index')
            ->with('success', 'Alumno eliminado correctamente');
    }
}
