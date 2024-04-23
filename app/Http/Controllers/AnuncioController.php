<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\AnuncioLeido;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Curso;
use App\Models\Padre;
use App\Models\Materia;
use App\Models\User;

class AnuncioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heads = [
            'Titulo',
            'Contenido',
            'Fecha',
            ['label' => 'Acciones', 'no-export' => true],
        ];
        $anuncios = Anuncio::all();
        return view('anuncios.index', compact('anuncios', 'heads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Aquí puedes pasar los datos necesarios a la vista, como la lista de cursos, estudiantes, etc.
        $estudiantes = Estudiante::all();
               $cursos = Curso::all();
               $padres = Padre::all();
               $materias = Materia::all();
               return view('anuncios.create', compact('estudiantes', 'cursos', 'padres', 'materias'));
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
    public function show(Anuncio $anuncio)
    {
           
        $archivos = $anuncio->archivos;
      //  $comentarios = $anuncio->comentarios()->orderBy('fecha', 'desc')->paginate(10);
        $user = User::find(auth()->user()->id);

        
        if($user->hasRole('Estudiante') || $user->hasRole('Padre')){
        
            $anuncioLeido = AnuncioLeido::where('anuncioId', $anuncio->id)->where('userId', $user->id)->first();
            if($anuncioLeido != null){
                if($anuncioLeido->leido == false){
                    $anuncioLeido->update([
                        'leido' => true
                    ]);
                }
            }

        }


        return view('anuncios.show', compact('anuncio','archivos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anuncio $anuncio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anuncio $anuncio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anuncio $anuncio)
    {
        $anuncio->usuariosQueLoLeen()->detach();
        $anuncio->delete();
        return redirect()->route('anuncios.index')->with('success', 'anuncio eliminado con éxito');
    }

    public function mostrarFormularioAnuncios()
    {
 
    }


}
