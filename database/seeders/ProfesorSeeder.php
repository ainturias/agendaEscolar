<?php

namespace Database\Seeders;

use App\Models\Profesor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Curso;
use App\Models\Materia;

class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $user1 = User::create([
            'name' => 'Profesor 1',
            'email' => 'profesor1@gmail.com',
            'password' => bcrypt('password'),

        ])->assignRole('Profesor');

        $user2 = User::create([
            'name' => 'Profesor 2',
            'email' => 'profesor2@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Profesor');

        $user3 = User::create([
            'name' => 'Profesor 3',
            'email' => 'profesor3@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Profesor');

        $user4 = User::create([
            'name' => 'Profesor 4',
            'email' => 'profesor4@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Profesor');

        $user5 = User::create([
            'name' => 'Profesor 5',
            'email' => 'Profesor5@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Profesor');

        $profesor1 = Profesor::create([
            'idU' => $user1->id,
            'edad' => 27,
            'direccion' => 'direccion 1',
            'telefono' => '123456789',
        ]);

        $profesor2 = Profesor::create([
            'idU' => $user2->id,
            'edad' => 28,
            'direccion' => 'direccion 2',
            'telefono' => '123456789',
        ]);

        $profesor3 = Profesor::create([
            'idU' => $user3->id,
            'edad' => 29,
            'direccion' => 'direccion 3',
            'telefono' => '123456789',
        ]);

        $profesor4 = Profesor::create([
            'idU' => $user4->id,
            'edad' => 30,
            'direccion' => 'direccion 4',
            'telefono' => '123456789',
        ]);

        $profesor5 = Profesor::create([
            'idU' => $user5->id,
            'edad' => 31,
            'direccion' => 'direccion 5',
            'telefono' => '123456789',
        ]);

        Materia::create([
            'nombre' => 'Matematicas',
            'grupo' => '1A',
            'idProfesor' => $user1->id,
        ]);

        Materia::create([
            'nombre' => 'Ciencias Naturales',
            'grupo' => '1A',
            'idProfesor' => $user1->id,
        ]);

        Materia::create([
            'nombre' => 'Tecnología o Informática',
            'grupo' => '1A',
            'idProfesor' => $user1->id,
        ]);

        Materia::create([
            'nombre' => 'Lengua y Literatura',
            'grupo' => '1A',
            'idProfesor' => $user1->id,
        ]);


        Materia::create([
            'nombre' => 'Matematicas',
            'grupo' => '1B',
            'idProfesor' => $user1->id,
        ]);

        Materia::create([
            'nombre' => 'Ciencias Naturales',
            'grupo' => '1B',
            'idProfesor' => $user1->id,
        ]);

        Materia::create([
            'nombre' => 'Tecnología o Informática',
            'grupo' => '1B',
            'idProfesor' => $user1->id,
        ]);

        Materia::create([
            'nombre' => 'Lengua y Literatura',
            'grupo' => '1B',
            'idProfesor' => $user1->id,
        ]);

        Materia::create([
            'nombre' => 'Matematicas',
            'grupo' => '2A',
            'idProfesor' => $user2->id,
        ]);

        Materia::create([
            'nombre' => 'Ciencias Naturales',
            'grupo' => '2A',
            'idProfesor' => $user2->id,
        ]);

        Materia::create([
            'nombre' => 'Tecnología o Informática',
            'grupo' => '2A',
            'idProfesor' => $user2->id,
        ]);

        Materia::create([
            'nombre' => 'Lengua y Literatura',
            'grupo' => '2A',
            'idProfesor' => $user2->id,
        ]);

        Materia::create([
            'nombre' => 'Matematicas',
            'grupo' => '2B',
            'idProfesor' => $user2->id,
        ]);

        Materia::create([
            'nombre' => 'Ciencias Naturales',
            'grupo' => '2B',
            'idProfesor' => $user2->id,
        ]);

        Materia::create([
            'nombre' => 'Tecnología o Informática',
            'grupo' => '2B',
            'idProfesor' => $user2->id,
        ]);

        Materia::create([
            'nombre' => 'Lengua y Literatura',
            'grupo' => '2B',
            'idProfesor' => $user2->id,
        ]);

        Materia::create([
            'nombre' => 'Matematicas',
            'grupo' => '3A',
            'idProfesor' => $user3->id,
        ]);

        Materia::create([
            'nombre' => 'Ciencias Naturales',
            'grupo' => '3A',
            'idProfesor' => $user3->id,
        ]);

        Materia::create([
            'nombre' => 'Tecnología o Informática',
            'grupo' => '3A',
            'idProfesor' => $user3->id,
        ]);

        Materia::create([
            'nombre' => 'Lengua y Literatura',
            'grupo' => '3A',
            'idProfesor' => $user3->id,
        ]);

        Materia::create([
            'nombre' => 'Matematicas',
            'grupo' => '3B',
            'idProfesor' => $user3->id,
        ]);

        Materia::create([
            'nombre' => 'Ciencias Naturales',
            'grupo' => '3B',
            'idProfesor' => $user3->id,
        ]);

        Materia::create([
            'nombre' => 'Tecnología o Informática',
            'grupo' => '3B',
            'idProfesor' => $user3->id,
        ]);

        Materia::create([
            'nombre' => 'Lengua y Literatura',
            'grupo' => '3B',
            'idProfesor' => $user3->id,
        ]);



        Curso::create([
            'nombre' => '1ro A',
            'nivel' => '1',
        ]);
        Curso::create([
            'nombre' => '1ro B',
            'nivel' => '1',
        ]);
        Curso::create([
            'nombre' => '2do A',
            'nivel' => '2',
        ]);
        Curso::create([
            'nombre' => '2do B',
            'nivel' => '2',
        ]);
        Curso::create([
            'nombre' => '3ro A',
            'nivel' => '3',
        ]);
        Curso::create([
            'nombre' => '3ro B',
            'nivel' => '3',
        ]);
        Curso::create([
            'nombre' => '4to A',
            'nivel' => '4',
        ]);
        Curso::create([
            'nombre' => '4to B',
            'nivel' => '4',
        ]);
        Curso::create([
            'nombre' => '5to A',
            'nivel' => '5',
        ]);
        Curso::create([
            'nombre' => '5to B',
            'nivel' => '5',
        ]);
        Curso::create([
            'nombre' => '6to A',
            'nivel' => '6',
        ]);
        Curso::create([
            'nombre' => '6to B',
            'nivel' => '6',
        ]);
    }
}
