<?php

namespace App\Http\Controllers;

use App\Models\TareaLeida;
use App\Models\User;
use Illuminate\Http\Request;

class TareaLeidaController extends Controller
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
    public function show(TareaLeida $tareaLeida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TareaLeida $tareaLeida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TareaLeida $tareaLeida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TareaLeida $tareaLeida)
    {
        //
    }

    public function tareaLeida($id)
    {
        $tareasLeidas = TareaLeida::where('tareaId', $id)->get();
        $usersWhoRead = [];
        $usersWhoDidNotRead = [];
        foreach ($tareasLeidas as $tareaLeida) {
            if ($tareaLeida->leido == true) {
                $usersWhoRead[] = User::find($tareaLeida->userId);
            } else {
                $usersWhoDidNotRead[] = User::find($tareaLeida->userId);
            }
        }
       
        return view('tareas.leido', compact('usersWhoRead', 'usersWhoDidNotRead'));
    }

}
