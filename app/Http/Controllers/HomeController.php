<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        if($user->hasRole('Profesor')){
            $profesor = $user->profesor;
            $materias = $profesor->materias;


        }else{
            $materias = [];
        }

        if($materias != null){
            foreach ($materias as $materia) {
                $cursos = $materia->cursos;
                foreach ($cursos as $curso) {
                    $estudiantes = $curso->estudiantes;
                    $materia->cantidadEstudiantes = count($estudiantes);
                }

            }
        }

        return view('home', compact('materias'));
    }
}
