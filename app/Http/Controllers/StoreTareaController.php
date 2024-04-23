<?php

namespace App\Http\Controllers;

use App\Models\ArchivoAdjunto;
use App\Models\Tarea;
use Illuminate\Http\Request;
use App\Models\TemporaryFiles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Materia;
use App\Models\User;
use App\Models\Estudiante;

class StoreTareaController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
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
            return redirect()->route('tareas.create')->withErrors($validator)->withInput(); // redirigimos a la vista de creación de tareas con los errores y los datos enviados
        }
        $tarea = Tarea::create([ // creamos un registro en la tabla tareas
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'startDate' => $request->fechaPresentacion,
            'endDate' => $request->fechaPresentacion,
            'profesorId' => auth()->user()->id,
            'materiaId' => $request->materiaId,
        ]);
        // $tarea = Tarea::create($validator->validated()); // creamos un registro en la tabla tareas con los datos validados

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


        $materia = Materia::find($request->materiaId);
        
        $cursos = $materia->cursos;
        foreach ($cursos as $curso) {
            $estudiantes = Estudiante::where('idCurso', $curso->id)->get();
        }
        
        foreach ($estudiantes as $estudiante) {
            $padres = $estudiante->padres;
            foreach ($padres as $padre) {
                $user = User::find($padre->idU);
                $user->tareasLeidas()->attach($tarea->id, ['leido' => false]);
            }
            $user2 = User::find($estudiante->idU);
            $user2->tareasLeidas()->attach($tarea->id, ['leido' => false]);  
        }

        return redirect()->route('tareas.create')->with('success', 'Tarea creada con éxito'); // redirigimos a la vista de tareas con un mensaje de éxito

    }
}
