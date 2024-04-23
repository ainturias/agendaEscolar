<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Tarea;
use Illuminate\Http\Request;
use App\Models\ArchivoAdjunto;
use App\Models\Estudiante;
use App\Models\TareaLeida;
use App\Models\User;
use App\Models\TemporaryFiles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heads = [
            'Nombre',
            'Descripción',
            'Fecha de entrega',
            'Materia',
            'Acciones'
        ];
        $profesor = auth()->user()->profesor;
        $tareas = $profesor->tareas;

        return view('tareas.index', compact('tareas', 'heads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $profesor = auth()->user()->profesor;
        $materias = $profesor->materias;
        return view('tareas.create', compact('materias'));
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

    public function show(Tarea $tarea)
    {
        $archivos = $tarea->archivos;
        $comentarios = $tarea->comentarios()->orderBy('fecha', 'desc')->paginate(10);

        $user = User::find(auth()->user()->id);

        if ($user->hasRole('Estudiante')) {

            $tareaLeida = TareaLeida::where('tareaId', $tarea->id)->where('userId', $user->id)->first();
            if ($tareaLeida != null) {
                if ($tareaLeida->leido == false) {
                    $tareaLeida->update([
                        'leido' => true
                    ]);
                }
            }
        }

        if ($comentarios->count() == 0) {
            $comentarios = null;
        }

        return view('tareas.show', compact('tarea', 'comentarios', 'archivos'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
    {

        $profesor = auth()->user()->profesor;
        $materias = $profesor->materias;
        $archivos = $tarea->archivos;
        return view('tareas.edit', compact('materias', 'tarea', 'archivos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [ // validamos los datos
            'titulo' =>  'required',
            'descripcion' =>  'required',
            'fechaPresentacion' => 'required',
            'materiaId' => 'required',
        ]);
        $temporaryFiles = TemporaryFiles::all(); // obtenemos todos los registros de la tabla temporary_files

        if ($validator->fails()) { // si la validación falla

            foreach ($temporaryFiles as $temporaryFile) { // recorremos los registros
                Storage::deleteDirectory('images/tmp/' . $temporaryFile->folder); // eliminamos las carpetas con las imágenes
                $temporaryFile->delete(); // eliminamos los registros de la tabla temporary_files
            }
            return redirect()->route('tareas.index')->withErrors($validator)->withInput(); // redirigimos a la vista de creación de tareas con los errores y los datos enviados
        }

        $tarea = Tarea::find($id);
        $tarea->update([ // creamos un registro en la tabla tareas
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'startDate' => $request->fechaPresentacion,
            'endDate' => $request->fechaPresentacion,
            'profesorId' => auth()->user()->id,
            'materiaId' => $request->materiaId,
        ]);
        $tarea->archivos()->delete();

        foreach ($temporaryFiles as $temporaryFile) { // recorremos los registros
            Storage::copy('images/tmp/' . $temporaryFile->folder . '/' . $temporaryFile->file, 'images/' . $temporaryFile->folder . '/' . $temporaryFile->file); // copiamos las imágenes de la carpeta temporal a la carpeta definitiva
            $temporaryFile->delete(); // eliminamos los registros de la tabla temporary_files

            ArchivoAdjunto::create([ // creamos un registro en la tabla archivo_adjuntos
                'filename' => $temporaryFile->file, // guardamos el nombre de la imagen
                'filepath' => 'images/' . $temporaryFile->folder . '/' . $temporaryFile->file, // guardamos la ruta de la imagen
                'archivoAdjunto_id' => $tarea->id, // guardamos el id de la tarea
                'archivoAdjunto_type' => 'App\Models\Tarea' // guardamos el modelo de la tarea
            ]);
            Storage::deleteDirectory('images/tmp/' . $temporaryFile->folder); // eliminamos las carpetas con las imágenes temporales una ves guardadas
            $temporaryFile->delete(); // eliminamos los registros de la tabla temporary_files

        }

        return redirect()->route('tareas.index')->with('success', 'Tarea creada con éxito'); // redirigimos a la vista de tareas con un mensaje de éxito
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        //
    }
}
