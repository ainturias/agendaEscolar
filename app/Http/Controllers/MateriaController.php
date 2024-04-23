<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;
use App\Models\Profesor;


class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materia $materia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materia $materia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materia $materia)
    {
        //
    }

    public function actualizarMaterias(Request $request, $id)
    {

        return redirect()->route('profesores.index')->with('success', 'materias actualizadas con éxito');
    }

    public function mostrarEstudiantes($id)
    {
        $materia = Materia::find($id);
        $cursos = $materia->cursos;
        foreach ($cursos as $curso) {
            $estudiantes = $curso->estudiantes;
        }
        return view('profesores.estudiantes', compact('estudiantes'));
    }
}
