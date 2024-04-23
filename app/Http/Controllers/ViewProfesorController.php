<?php

namespace App\Http\Controllers;


use App\Models\Materia;
use App\Models\Profesor;
use Illuminate\Http\Request;

class ViewProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profesor = Profesor::find(3);
        $materias = $profesor->materias;
        $cantidadMaterias = count($materias);
        return view('ViewProfesor.index', compact('materias', 'cantidadMaterias'));
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
    public function show(string $id)
    {
        $materia = Materia::find($id);
        $cursos = $materia->cursos;
        foreach ($cursos as $curso) {
            $estudiantes = $curso->estudiantes;
        }
        

        return view('ViewProfesor.show', compact('estudiantes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
