<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
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


    }

    /**
     * Display the specified resource.
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         
        if(Auth::check())
        {
            $request->validate([
                'contenido' => 'required',
            ]);
     
            $comentario = new Comentario();
            
            
            $comentario->contenido = $request->contenido;
            $comentario->tareaId = $id;
            $comentario->userId = auth()->user()->id;
            $comentario->fecha = now();
            $comentario->save();
            return redirect()->route('tareas.show', $id)->with('success', 'Comentario creado con éxito');
        }
        else
        {
            return redirect()->route('dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        $comentario->delete();
        return redirect()->route('tareas.show', $comentario->tareaId)->with('success', 'Comentario eliminado con éxito');
    }
}
