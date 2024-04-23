<?php

namespace App\Imports;

use App\Models\Estudiante;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EstudianteImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
        
    //     $user = User::create([
    //         'name' => $row['name'], 
    //         'email' => $row['email'], 
    //         'password' => $row['password'], 
    //     ]);
    
    //     $estudiante = new Estudiante([
    //         'edad' => $row['edad'], 
    //         'tipo_sanguineo' => $row['tipo_sanguineo'], 
    //         'alergias' => $row['alergias'], 
    //     ]);
    //     $estudiante->idU = $user->id;
    
    //     // Guarda la relación entre el usuario y el estudiante
    //     $user->estudiante()->save($estudiante);
        
       
    //     return $estudiante;
    // }

    public function collection (Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $user = User::create([
                'name' => $row['name'], 
                'email' => $row['email'], 
                'password' => Hash::make($row['password']), 
            ]);
        
            $estudiante = new Estudiante([
                'edad' => $row['edad'], 
                'tipo_sanguineo' => $row['tipo_sanguineo'], 
                'alergias' => $row['alergias'], 
            ]);
            $estudiante->idU = $user->id;
        
            // Guarda la relación entre el usuario y el estudiante
            $user->estudiante()->save($estudiante);
        }
    }

}
