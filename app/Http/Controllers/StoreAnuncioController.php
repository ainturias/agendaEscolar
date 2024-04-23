<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use Illuminate\Http\Request;
use App\Models\TemporaryFiles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\ArchivoAdjunto;
use App\Models\Estudiante;
use App\Models\Materia;
use App\Models\Padre;
use App\Models\User;
class StoreAnuncioController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
         
        $validator = Validator::make($request->all(), [ // validamos los datos
            'titulo' =>  'required',
            'contenido' =>  'required',
            'fecha' => 'required',
            'destinatario' => 'required',
        ]);

        $temporaryFiles = TemporaryFiles::all(); // obtenemos todos los registros de la tabla temporary_files
        
        if ($validator->fails()) { // si la validación falla
           
            foreach ($temporaryFiles as $temporaryFile) { // recorremos los registros
                Storage::deleteDirectory('images/tmp/' . $temporaryFile->folder); // eliminamos las carpetas con las imágenes
                $temporaryFile->delete(); // eliminamos los registros de la tabla temporary_files
            }
            return redirect()->route('anuncios.create')->withErrors($validator)->withInput(); // redirigimos a la vista de creación de tareas con los errores y los datos enviados
        }

        $anuncio = Anuncio::create([ // creamos un registro en la tabla tareas
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'startDate' => $request->fecha,
            'endDate' => $request->fecha,
            'adminId' => auth()->user()->id,
        ]);

        // $tarea = Tarea::create($validator->validated()); // creamos un registro en la tabla tareas con los datos validados

        foreach ($temporaryFiles as $temporaryFile) { // recorremos los registros
            Storage::copy('images/tmp/' . $temporaryFile->folder . '/' . $temporaryFile->file, 'images/' . $temporaryFile->folder . '/' . $temporaryFile->file); // copiamos las imágenes de la carpeta temporal a la carpeta definitiva
            $temporaryFile->delete(); // eliminamos los registros de la tabla temporary_files

            ArchivoAdjunto::create([ // creamos un registro en la tabla archivo_adjuntos
                'filename' => $temporaryFile->file, // guardamos el nombre de la imagen
                'filepath' => 'images/' . $temporaryFile->folder . '/' . $temporaryFile->file, // guardamos la ruta de la imagen
                'archivoAdjunto_id' => $anuncio->id, // guardamos el id de la tarea
                'archivoAdjunto_type' => 'App\Models\Anuncio' // guardamos el modelo de la tarea
            ]);
            Storage::deleteDirectory('images/tmp/' . $temporaryFile->folder); // eliminamos las carpetas con las imágenes temporales una ves guardadas
            $temporaryFile->delete(); // eliminamos los registros de la tabla temporary_files
        }



        //esta es la logica para crear la lista de los usuarios que puedan un anuncio x 
        $destinatario = $request->destinatario;
    
        switch ($destinatario) {
            case 'curso':
                $cursoId = $request->input('curso');
                $estudiantes = Estudiante::where('idCurso', $cursoId)->get();

                foreach ($estudiantes as $estudiante) {
                    $padres = $estudiante->padres;
                    foreach ($padres as $padre) {
                        $user = User::find($padre->idU);
                        $user->anunciosLeidos()->attach($anuncio->id, ['leido' => false]);
                    }
                    $user2 = User::find($estudiante->idU);
                    $user2->anunciosLeidos()->attach($anuncio->id, ['leido' => false]);  
                }


            break;
            case 'materia':
                $materiaId = $request->input('materia');
                $materia = Materia::find($materiaId);
                
                $cursos = $materia->cursos;
                foreach ($cursos as $curso) {
                    $estudiantes = Estudiante::where('idCurso', $curso->id)->get();
                }
                
                foreach ($estudiantes as $estudiante) {
                    $padres = $estudiante->padres;
                    foreach ($padres as $padre) {
                        $user = User::find($padre->idU);
                        $user->anunciosLeidos()->attach($anuncio->id, ['leido' => false]);
                    }
                    $user2 = User::find($estudiante->idU);
                    $user2->anunciosLeidos()->attach($anuncio->id, ['leido' => false]);  
                }
                
            break;
            case 'estudiante':
                $estudianteId = $request->input('estudiante');

                $estudiante = Estudiante::find($estudianteId);
                $padres = $estudiante->padres;
                foreach ($padres as $padre) {
                    $user = User::find($padre->idU);
                    $user->anunciosLeidos()->attach($anuncio->id, ['leido' => false]);
                }
                $user2 = User::find($estudiante->idU);
                $user2->anunciosLeidos()->attach($anuncio->id, ['leido' => false]);

            break;
            case 'padre':
                $padreId = $request->input('padre');
                $padre = Padre::find($padreId);
                $user = User::find($padre->idU);
                $user->anunciosLeidos()->attach($anuncio->id, ['leido' => false]);

                
            
            break;
            case 'colegio':
                $estudiantes = Estudiante::all();
                
                foreach ($estudiantes as $estudiante) {
                    $padres = $estudiante->padres;
                    foreach ($padres as $padre) {
                        $user = User::find($padre->idU);
                        $user->anunciosLeidos()->attach($anuncio->id, ['leido' => false]);
                    }
                    $user2 = User::find($estudiante->idU);
                    $user2->anunciosLeidos()->attach($anuncio->id, ['leido' => false]);  
                }
                break;
            default:
            dd('no entro a ningun lado');
            break;
        }



        return redirect()->route('anuncios.create')->with('success', 'Anuncio creada con éxito'); // redirigimos a la vista de tareas con un mensaje de éxito
    }

}
