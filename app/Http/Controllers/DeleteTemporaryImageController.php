<?php

namespace App\Http\Controllers;
use App\Models\TemporaryFiles;
use Illuminate\Support\Facades\Storage;

class DeleteTemporaryImageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke( )
    {
      $temporaryFile = TemporaryFiles::where('folder', request()->getContent())->first(); // buscamos el registro en la tabla temporary_files
        if($temporaryFile){ // si encontramos el registro
            Storage::deleteDirectory('images/tmp/'. $temporaryFile->folder); // eliminamos la carpeta con la imagen
            $temporaryFile->delete(); // eliminamos el registro de la tabla temporary_files
        }
        return response()->noContent(); // retornamos una respuesta vacía
    }
}
