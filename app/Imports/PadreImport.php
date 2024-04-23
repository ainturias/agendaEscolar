<?php

namespace App\Imports;

use App\Models\Padre;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
 


class PadreImport implements ToCollection, WithHeadingRow
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
        
            $padre = new Padre([
                'edad' => intval($row['edad']),
                'ci' => $row['ci'],
                'telefono' => $row['telefono'], 
                'direccion' => $row['direccion'], 
            ]);
            $padre->idU = $user->id;
        
            // Guarda la relación entre el usuario y el estudiante
            $user->padre()->save($padre);
        }
    }
}
