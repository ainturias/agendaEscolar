<?php

namespace App\Http\Controllers;

use App\Models\Padre;
use Illuminate\Http\Request;
use App\Models\User;

class PadreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $heads = [
            'Nombre',
            'Email',
            'Edad',
            'Carnet de Identidad',
            'Telefono',
            'Direccion',
            ['label' => 'Acciones', 'no-export' => true],
        ];
        $padres = Padre::all();
        return view('padres.index', compact('padres', 'heads'));
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
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'edad' => 'required',
            'ci' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
        ]);
 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password'),
        ]);
        $user->assignRole('Padre');

        $padre = new Padre();
        $padre->ci = $request->ci;
        $padre->edad = $request->edad;
        $padre->telefono = $request->telefono;
        $padre->direccion = $request->direccion;
        $padre->idU = $user->id;
        $padre->save();

 
        return redirect()->route('padres.index')->with('success', 'padre creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Padre $padre)
    {
        return view('padres.show', compact('padre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Padre $padre)
    {
        return view('padres.edit', compact('padre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'edad' => 'required',
            'ci' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
        ]);
 
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $padre = Padre::find($id);
        $padre->ci = $request->ci;
        $padre->edad = $request->edad;
        $padre->telefono = $request->telefono;
        $padre->direccion = $request->direccion;
        $padre->save();

        return redirect()->route('padres.index')->with('success', 'padre actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $padre = Padre::find($id);
        $user = User::find($padre->idU);
        $padre->delete();
        $user->delete();

        return redirect()->route('padres.index')->with('success', 'padre eliminado con éxito');
    }
}
