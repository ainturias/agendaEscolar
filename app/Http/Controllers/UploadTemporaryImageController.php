<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryFiles;
 

class UploadTemporaryImageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if($request->hasFile('image')){
            $image = $request->file('image');  // obtenemos la imagen de la petición y la metemos en image
            $file_name = $image->getClientOriginalName();  // obtenemos el nombre original de la imagen
            $folder = uniqid('image-', true); // creamos un nombre único para la carpeta
            $image->storeAs('images/tmp/'. $folder, $file_name); // guardamos la imagen en la carpeta tmp
            TemporaryFiles::create([ // creamos un registro en la tabla temporary_files
                'file' => $file_name, // guardamos el nombre original de la imagen
                'folder' => $folder // guardamos el nombre de la carpeta
            ]);
            return $folder; // retornamos el nombre de la carpeta para que el frontend pueda mostrar la imagen
        }
         return ''; // si no se envió ninguna imagen retornamos un string vacío
    }
}
