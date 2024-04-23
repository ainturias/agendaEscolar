<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EstudianteImport;
use App\Imports\PadreImport;
use App\Imports\ProfesorImport;


class CsvController extends Controller
{
    public function importEstudiantes(Request $request)
    {

        $request->validate([
            'document_csv' => 'required'
        ]);     
        $file = $request->file('document_csv');
        Excel::import(new EstudianteImport, $file);
        return redirect()->route('estudiantes.index')->with('success', 'Estudiantes importados correctamente');

    }
    public function importPadres(Request $request)
    {

        $request->validate([
            'document_csv' => 'required'
        ]);     
        $file = $request->file('document_csv');
        Excel::import(new PadreImport, $file);
         return redirect()->route('padres.index')->with('success', 'Padres importados correctamente');

    }
    public function importProfesor(Request $request)
    {

        $request->validate([
            'document_csv' => 'required'
        ]);     
        $file = $request->file('document_csv');
        Excel::import(new ProfesorImport, $file);
         return redirect()->route('profesores.index')->with('success', 'Profesores importados correctamente');

    }
    public function export(){
        
    }
}
