<?php

namespace App\Http\Controllers;

use App\Models\alumno;
use App\Http\Requests\StorealumnoRequest;
use App\Http\Requests\UpdatealumnoRequest;
use Illuminate\Support\Facades\Schema; 

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorealumnoRequest $request)
    {
        // Crear el alumno con los datos del formulario
        $alumno = new Alumno();
        $alumno->nombre = $request->nombre;
        $alumno->apellido = $request->apellido;
        $alumno->email = $request->email;
        $alumno->fecha_nacimiento = $request->fecha_nacimiento;
        $alumno->save();

        return redirect()->route('alumnos.index')
                        ->with('success', 'Alumno creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatealumnoRequest $request, alumno $alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(alumno $alumno)
    {
        //
    }
}
