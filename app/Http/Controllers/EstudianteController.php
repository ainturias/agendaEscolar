<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Grado;
use Illuminate\Http\Request;
use App\Models\Padre;
use App\Models\Curso;
use App\Models\User;


class EstudianteController extends Controller
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
            'Tipo Sanguineo',
            'Alergias',
            'Curso',
            ['label' => 'Acciones', 'no-export' => true],
        ];
        $estudiantes = Estudiante::all();
        $cursos = Curso::all();
        $padres = Padre::all();
        return view('estudiantes.index', compact('estudiantes', 'heads', 'cursos', 'padres'));
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
            'tipo_sanguineo' => 'required',
            'alergias' => 'required',
            'idCurso' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password'),
        ]);

        $user->assignRole('Estudiante');

        $estudiante = Estudiante::create([
            'edad' => $request->edad,
            'tipo_sanguineo' => $request->tipo_sanguineo,
            'alergias' => $request->alergias,
            'idCurso' => $request->idCurso,
            'idU' => $user->id,
        ]);
        // esta parte es bien rara el idU se asigna en 0 no entiendo xq pero eso pasa siendo que el id del user es otro por eso se asigna de nuevo abajo 
        // para que no se vea tan feo mando directo el id de usuario al metodo
        $this->asignarPadre($request->padres, $user->id);
        return redirect()->route('estudiantes.index')->with('success', 'estudiante creado con éxito');
    }

    public function asignarPadre($padres, $idU)
    {

        foreach ($padres as $padre) {
            $padre = Padre::find($padre);
            $padre->estudiantes()->attach($idU);
        }
    }

    public function actualizarPadres($padres, $idEstudiante)
    {
        $estudiante = Estudiante::findOrFail($idEstudiante);  // Obtener los IDs de los padres a partir del array recibido
        $padresIds = array_map('intval', $padres);
        $estudiante->padres()->sync($padresIds);  // Sincronizar los padres asociados al estudiante
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiante $estudiante)
    {
        return view('estudiantes.show', compact('estudiante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estudiante $estudiante)
    {
        $cursos = Curso::all();
        $padres = Padre::all();
        return view('estudiantes.edit', compact('estudiante', 'cursos', 'padres'));
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
            'tipo_sanguineo' => 'required',
            'alergias' => 'required',
            'idCurso' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $estudiante = Estudiante::find($id);
        $estudiante->edad = $request->edad;
        $estudiante->tipo_sanguineo = $request->tipo_sanguineo;
        $estudiante->alergias = $request->alergias;
        $estudiante->idCurso = $request->idCurso;
        $estudiante->save();

        $this->actualizarPadres($request->padres, $id);


        return redirect()->route('estudiantes.index')->with('success', 'padre actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $estudiante = Estudiante::find($id);
        $user = User::find($estudiante->idU);
        $estudiante->delete();
        $user->delete();
        return redirect()->route('estudiantes.index')->with('success', 'estudiante eliminado con éxito');
    }
}
