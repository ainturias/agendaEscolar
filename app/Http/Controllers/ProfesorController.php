<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\User;

class ProfesorController extends Controller
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
            'Direccion',
            'Telefono',
            ['label' => 'Acciones', 'no-export' => true],
        ];

        $materias = Materia::all();
        $materiasDisponibles = Materia::where('idProfesor', null)->get();
        $profesores = Profesor::all();
        return view('profesores.index', compact('heads', 'materias', 'profesores', 'materiasDisponibles'));
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
            'direccion' => 'required',
            'telefono' => 'required',
        ]);
 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password'),
        ]);
        $user->assignRole('Profesor');

        $profesor = new Profesor();
        $profesor->edad = $request->edad;
        $profesor->direccion = $request->direccion;
        $profesor->telefono = $request->telefono;
        $profesor->idU = $user->id;
        $profesor->save();

        $this->asignarMateria($request->materias2, $user->id);
      



 
        return redirect()->route('profesores.index')->with('success', 'profesor creado con éxito');
    }

    public function asignarMateria($ids, $idU)
    {
 
        foreach ($ids as $id) {
            $materia = Materia::find($id);
            $materia->idProfesor = $idU;
            $materia->save();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $profesor = Profesor::find($id);
        return view('profesores.show', compact('profesor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $profesor = Profesor::find($id);
        return view('profesores.edit', compact('profesor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'edad' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
        ]);
 
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
      $profesor = Profesor::find($id);
        $profesor->update([
            'edad' => $request->edad,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
        ]);
 
        return redirect()->route('profesores.index')->with('success', 'profesor actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $profesor = Profesor::find($id);
        $user = User::find($profesor->idU);
        $profesor->delete();
        $user->delete();

        return redirect()->route('profesores.index')->with('success', 'padre eliminado con éxito');
        
    }


}
