<?php

namespace App\Http\Controllers;

use App\Models\AnuncioLeido;
use Illuminate\Http\Request;
use App\Models\User;

class AnuncioLeidoController extends Controller
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
    public function show(AnuncioLeido $anuncioLeido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnuncioLeido $anuncioLeido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnuncioLeido $anuncioLeido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnuncioLeido $anuncioLeido)
    {
        //
    }

    public function anuncioLeido($id)
    {
        $anunciosLeidos = AnuncioLeido::where('anuncioId', $id)->get();
        $usersWhoRead = [];
        $usersWhoDidNotRead = [];
        foreach ($anunciosLeidos as $anuncioLeido) {
            if ($anuncioLeido->leido == true) {
                $usersWhoRead[] = User::find($anuncioLeido->userId);
            } else {
                $usersWhoDidNotRead[] = User::find($anuncioLeido->userId);
            }
        }
       
        return view('anuncios.leido', compact('usersWhoRead', 'usersWhoDidNotRead'));
    }
}
