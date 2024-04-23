<?php

namespace App\Imports;

use App\Models\Profesor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;


class ProfesorImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection (Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $user = User::create([
                'name' => $row['name'], 
                'email' => $row['email'], 
                'password' => Hash::make($row['password']), 
            ]);
        
            $profesor = new Profesor([
                'edad' => $row['edad'],
                'direccion' => $row['direccion'], 
                'telefono' => $row['telefono'],
            ]);
            $profesor->idU = $user->id;
        
            // Guarda la relación entre el usuario y el estudiante
            $user->profesor()->save($profesor);
        }
    }
}
