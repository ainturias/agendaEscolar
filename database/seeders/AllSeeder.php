<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\Profesor;
use App\Models\User;
use App\Models\CursoMaterias;
use App\Models\Materia;
use App\Models\Padre;
use App\Models\PadreEstudiante;



class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'name' => 'Carlos valenzuela',
            'email' => 'profesor1@gmail.com',
            'password' => bcrypt('password'),
            
        ])->assignRole('Profesor');

        $user2 = User::create([
            'name' => 'Martin Garcia Lopez',
            'email' => 'profesor2@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Profesor');

        $user3 = User::create([
            'name' => 'Carlos Francisco Gutierrez',
            'email' => 'profesor3@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Profesor');

        $user4 = User::create([
            'name' => 'Adriana Melgarejo Ruiz',
            'email' => 'profesor4@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Profesor');

        $user5 = User::create([
            'name' => 'Luisa Mendoza Perez',
            'email' => 'Profesor5@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Profesor');

        $profesor1 = Profesor::create([
            'idU' => $user1->id,
            'edad' => 27,
            'direccion' => 'direccion 1',
            'telefono' => '+591 71234567',
        ]);

        $profesor2 = Profesor::create([
            'idU' => $user2->id,
            'edad' => 28,
            'direccion' => 'Avenida San Martín #305',
            'telefono' => '+591 71234568',
        ]);

        $profesor3 = Profesor::create([
            'idU' => $user3->id,
            'edad' => 29,
            'direccion' => 'Calle Sucre #150',
            'telefono' => '+591 71234569',
        ]);

        $profesor4 = Profesor::create([
            'idU' => $user4->id,
            'edad' => 30,
            'direccion' => 'Calle Beni #234',
            'telefono' => '+591 71234570',
        ]);

        $profesor5 = Profesor::create([
            'idU' => $user5->id,
            'edad' => 31,
            'direccion' => 'Avenida San Aurelio #362',
            'telefono' => '+591 71234571',
        ]);



        //!! 12 cursos 1roA, 1roB, 2doA, 2doB, 3roA, 3roB, 4toA, 4toB, 5toA, 5toB, 6toA, 6toB

        $curso1A = Curso::create([
            'nombre' => '1ro A',
            'nivel' => '1',
        ]);
        $curso1B = Curso::create([
            'nombre' => '1ro B',
            'nivel' => '1',
        ]);
        $curso2A = Curso::create([
            'nombre' => '2do A',
            'nivel' => '2',
        ]);
        $curso2B = Curso::create([
            'nombre' => '2do B',
            'nivel' => '2',
        ]);
        $curso3A = Curso::create([
            'nombre' => '3ro A',
            'nivel' => '3',
        ]);
        $curso3B = Curso::create([
            'nombre' => '3ro B',
            'nivel' => '3',
        ]);
        $curso4A = Curso::create([
            'nombre' => '4to A',
            'nivel' => '4',
        ]);
        $curso4B = Curso::create([
            'nombre' => '4to B',
            'nivel' => '4',
        ]);
        $curso5A = Curso::create([
            'nombre' => '5to A',
            'nivel' => '5',
        ]);
        $curso5B = Curso::create([
            'nombre' => '5to B',
            'nivel' => '5',
        ]);
        $curso6A = Curso::create([
            'nombre' => '6to A',
            'nivel' => '6',
        ]);
        $curso6B = Curso::create([
            'nombre' => '6to B',
            'nivel' => '6',
        ]);

        //!! 24 materias Matematicas 1A, Lenguaje 1A, Ciencias Sociales 1A, Biologia 1A, Matematicas 1B, Lenguaje 1B, Ciencias Sociales 1B, Biologia 1B, Matematicas 2A, Lenguaje 2A, Ciencias Sociales 2A, Biologia 2A, Matematicas 2B, Lenguaje 2B, Ciencias Sociales 2B, Biologia 2B, Matematicas 3A, Lenguaje 3A, Ciencias Sociales 3A, Biologia 3A, Matematicas 3B, Lenguaje 3B, Ciencias Sociales 3B, Biologia 3B

        $materia1 = Materia::create([
            'nombre' => 'Matematicas',
            'grupo' => '1A',
            'idProfesor' => $user1->id,
        ]);

        $materia2 = Materia::create([
            'nombre' => 'Lenguaje',
            'grupo' => '1A',
            'idProfesor' => $user1->id,
        ]);

        $materia3 = Materia::create([
            'nombre' => 'Ciencias Sociales',
            'grupo' => '1A',
            'idProfesor' => $user1->id,
        ]);

        $materia4 = Materia::create([
            'nombre' => 'Biologia',
            'grupo' => '1A',
            'idProfesor' => $user1->id,
        ]);


        $materia5 = Materia::create([
            'nombre' => 'Matematicas',
            'grupo' => '1B',
            'idProfesor' => $user1->id,
        ]);

        $materia6 = Materia::create([
            'nombre' => 'Lenguaje',
            'grupo' => '1B',
            'idProfesor' => $user1->id,
        ]);

        $materia7 = Materia::create([
            'nombre' => 'Ciencias Sociales',
            'grupo' => '1B',
            'idProfesor' => $user1->id,
        ]);

        $materia8 = Materia::create([
            'nombre' => 'Biologia',
            'grupo' => '1B',
            'idProfesor' => $user1->id,
        ]);

        $materia9 = Materia::create([
            'nombre' => 'Matematicas',
            'grupo' => '2A',
            'idProfesor' => $user2->id,
        ]);

        $materia10 = Materia::create([
            'nombre' => 'Lenguaje',
            'grupo' => '2A',
            'idProfesor' => $user2->id,
        ]);

        $materia11 = Materia::create([
            'nombre' => 'Ciencias Sociales',
            'grupo' => '2A',
            'idProfesor' => $user2->id,
        ]);

        $materia12 = Materia::create([
            'nombre' => 'Biologia',
            'grupo' => '2A',
            'idProfesor' => $user2->id,
        ]);

        $materia13 = Materia::create([
            'nombre' => 'Matematicas',
            'grupo' => '2B',
            'idProfesor' => $user2->id,
        ]);

        $materia14 = Materia::create([
            'nombre' => 'Lenguaje',
            'grupo' => '2B',
            'idProfesor' => $user2->id,
        ]);

        $materia15 = Materia::create([
            'nombre' => 'Ciencias Sociales',
            'grupo' => '2B',
            'idProfesor' => $user2->id,
        ]);

        $materia16 = Materia::create([
            'nombre' => 'Biologia',
            'grupo' => '2B',
            'idProfesor' => $user2->id,
        ]);

        $materia17 = Materia::create([
            'nombre' => 'Matematicas',
            'grupo' => '3A',
            'idProfesor' => $user3->id,
        ]);

        $materia18 = Materia::create([
            'nombre' => 'Lenguaje',
            'grupo' => '3A',
            'idProfesor' => $user3->id,
        ]);

        $materia19 = Materia::create([
            'nombre' => 'Ciencias Sociales',
            'grupo' => '3A',
            'idProfesor' => $user3->id,
        ]);

        $materia20 = Materia::create([
            'nombre' => 'Biologia',
            'grupo' => '3A',
            'idProfesor' => $user3->id,
        ]);

        $materia21 = Materia::create([
            'nombre' => 'Matematicas',
            'grupo' => '3B',
            'idProfesor' =>$user3->id,
        ]);

        $materia22 = Materia::create([
            'nombre' => 'Lenguaje',
            'grupo' => '3B',
            'idProfesor' => $user3->id,
        ]);

        $materia23 = Materia::create([
            'nombre' => 'Ciencias Sociales',
            'grupo' => '3B',
            'idProfesor' => $user3->id,
        ]);

        $materia24 = Materia::create([
            'nombre' => 'Biologia',
            'grupo' => '3B',
            'idProfesor' => $user3->id,
        ]);

        $materia25 = Materia::create([
            'nombre' => 'Computacion',
            'grupo' => '6B',
            'idProfesor' => null,
        ]);

        $materia26 = Materia::create([
            'nombre' => 'Atletismo',
            'grupo' => '6B',
            'idProfesor' => null,
        ]);


        CursoMaterias::create([
            'idCurso' => $curso1A->id,
            'idMateria' => $materia1->id,
        ]);

        CursoMaterias::create([
            'idCurso' => $curso1A->id,
            'idMateria' => $materia2->id,
        ]);

        CursoMaterias::create([
            'idCurso' => $curso1A->id,
            'idMateria' => $materia3->id,
        ]);

        CursoMaterias::create([
            'idCurso' => $curso1A->id,
            'idMateria' => $materia4->id,
        ]);

        CursoMaterias::create([
            'idCurso' => $curso1B->id,
            'idMateria' => $materia5->id,
        ]);

        CursoMaterias::create([
            'idCurso' => $curso1B->id,
            'idMateria' => $materia6->id,
        ]);

        CursoMaterias::create([
            'idCurso' => $curso1B->id,
            'idMateria' => $materia7->id,
        ]);

        CursoMaterias::create([
            'idCurso' => $curso1B->id,
            'idMateria' => $materia8->id,
        ]);

        CursoMaterias::create([
            'idCurso' => $curso2A->id,
            'idMateria' => $materia9->id,
        ]);

        CursoMaterias::create([
            'idCurso' => $curso2A->id,
            'idMateria' => $materia10->id,
        ]);

        CursoMaterias::create([
            'idCurso' => $curso2A->id,
            'idMateria' => $materia11->id,
        ]);

        CursoMaterias::create([
            'idCurso' => $curso2A->id,
            'idMateria' => $materia12->id,
        ]);

        CursoMaterias::create([
            'idCurso' => $curso2B->id,
            'idMateria' => $materia13->id,
        ]);

        CursoMaterias::create([
            'idCurso' => $curso2B->id,
            'idMateria' => $materia14->id,
        ]);

        CursoMaterias::create([
            'idCurso' => $curso2B->id,
            'idMateria' => $materia15->id,
        ]);

        CursoMaterias::create([
            'idCurso' => $curso2B->id,
            'idMateria' => $materia16->id,
        ]);

        CursoMaterias::create([
            'idCurso' => $curso3A->id,
            'idMateria' => $materia17->id,
        ]);

        CursoMaterias::create([
            'idCurso' => $curso3A->id,
            'idMateria' => $materia18->id,
        ]);

        CursoMaterias::create([
            'idCurso' => $curso3A->id,
            'idMateria' => $materia19->id,
        ]);

        CursoMaterias::create([
            'idCurso' => $curso3A->id,
            'idMateria' => $materia20->id,
        ]);

        CursoMaterias::create([
            'idCurso' => $curso3B->id,
            'idMateria' => $materia21->id,
        ]);

        CursoMaterias::create([
            'idCurso' => $curso3B->id,
            'idMateria' => $materia22->id,
        ]);

        CursoMaterias::create([
            'idCurso' => $curso3B->id,
            'idMateria' => $materia23->id,
        ]);

        CursoMaterias::create([
            'idCurso' => $curso3B->id,
            'idMateria' => $materia24->id,
        ]);


 

        //!! 20 estudiantes

        $use1 = User::create([
            'name' => 'Manuel Ortiz',
            'email' => 'estudiante1@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Estudiante');
        
        $use2 = User::create([
            'name' => 'Alejandra Soto',
            'email' => 'estudiante2@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Estudiante');
        
        $use3 = User::create([
            'name' => 'Luis García',
            'email' => 'estudiante3@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Estudiante');

        $use4 = User::create([
            'name' => 'María Fernández',
            'email' => 'estudiante4@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Estudiante');
        
        $use5 = User::create([
            'name' => 'Carlos López',
            'email' => 'estudiante5@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Estudiante');
        
        $use6 = User::create([
            'name' => 'Ana Martínez',
            'email' => 'estudiante6@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Estudiante');
        
        $use7 = User::create([
            'name' => 'Jorge Rodríguez',
            'email' => 'estudiante7@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Estudiante');
        
        $use8 = User::create([
            'name' => 'Laura Pérez',
            'email' => 'estudiante8@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Estudiante');
        
        $use9 = User::create([
            'name' => 'Diego González',
            'email' => 'estudiante9@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Estudiante');
        
        $use10 = User::create([
            'name' => 'Natalia Ramírez',
            'email' => 'estudiante10@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Estudiante');
        
        $use11 = User::create([
            'name' => 'Gabriel Torres',
            'email' => 'estudiante11@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Estudiante');
        
        $use12 = User::create([
            'name' => 'Paola Vargas',
            'email' => 'estudiante12@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Estudiante');
        
        $use13 = User::create([
            'name' => 'José Gómez',
            'email' => 'estudiante13@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Estudiante');
        
        $use14 = User::create([
            'name' => 'Camila Díaz',
            'email' => 'estudiante14@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Estudiante');
        
        $use15 = User::create([
            'name' => 'Martín Ruiz',
            'email' => 'estudiante15@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Estudiante');
        
        $use16 = User::create([
            'name' => 'Valentina Sánchez',
            'email' => 'estudiante16@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Estudiante');
        
        $use17 = User::create([
            'name' => 'Andrés Castro',
            'email' => 'estudiante17@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Estudiante');
        
        $use18 = User::create([
            'name' => 'Fernanda Mendoza',
            'email' => 'estudiante18@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Estudiante');
        
        $use19 = User::create([
            'name' => 'Ricardo Medina',
            'email' => 'estudiante19@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Estudiante');
        
        $use20 = User::create([
            'name' => 'Paula Castillo',
            'email' => 'estudiante20@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Estudiante');
        

        $estudiante1 = Estudiante::create([
            'edad' => 7,
            'tipo_sanguineo' => 'O+',
            'alergias' => 'Ninguna',
            'idCurso' => $curso1A->id,
            'idU' => $use1->id,
        ]);

        $estudiante2 = Estudiante::create([
            'edad' => 7,
            'tipo_sanguineo' => 'O+',
            'alergias' => 'Ninguna',
            'idCurso' => $curso1A->id,
            'idU' => $use2->id,
        ]);

        $estudiante3 = Estudiante::create([
            'edad' => 7,
            'tipo_sanguineo' => 'O+',
            'alergias' => 'Ninguna',
            'idCurso' => $curso1A->id,
            'idU' => $use3->id,
        ]);

        $estudiante4 = Estudiante::create([
            'edad' => 7,
            'tipo_sanguineo' => 'O+',
            'alergias' => 'Ninguna',
            'idCurso' => $curso1A->id,
            'idU' => $use4->id,
        ]);

        $estudiante5 = Estudiante::create([
            'edad' => 7,
            'tipo_sanguineo' => 'O+',
            'alergias' => 'Ninguna',
            'idCurso' => $curso1A->id,
            'idU' => $use5->id,
        ]);

        $estudiante6 = Estudiante::create([
            'edad' => 6,
            'tipo_sanguineo' => 'O+',
            'alergias' => 'Ninguna',
            'idCurso' => $curso1B->id,
            'idU' => $use6->id,
        ]);

        $estudiante7 = Estudiante::create([
            'edad' => 6,
            'tipo_sanguineo' => 'O+',
            'alergias' => 'Ninguna',
            'idCurso' => $curso1B->id,
            'idU' => $use7->id,
        ]);

        $estudiante8 = Estudiante::create([
            'edad' => 6,
            'tipo_sanguineo' => 'O+',
            'alergias' => 'Ninguna',
            'idCurso' => $curso1B->id,
            'idU' => $use8->id,
        ]);

        $estudiante9 = Estudiante::create([
            'edad' => 6,
            'tipo_sanguineo' => 'O+',
            'alergias' => 'Ninguna',
            'idCurso' => $curso1B->id,
            'idU' => $use9->id,
        ]);

        $estudiante10 = Estudiante::create([
            'edad' => 6,
            'tipo_sanguineo' => 'O+',
            'alergias' => 'Ninguna',
            'idCurso' => $curso1B->id,
            'idU' => $use10->id,
        ]);

        $estudiante11 = Estudiante::create([
            'edad' => 6,
            'tipo_sanguineo' => 'O+',
            'alergias' => 'Ninguna',
            'idCurso' => $curso2A->id,
            'idU' => $use11->id,
        ]);

        $estudiante12 = Estudiante::create([
            'edad' => 6,
            'tipo_sanguineo' => 'O+',
            'alergias' => 'Ninguna',
            'idCurso' => $curso2A->id,
            'idU' => $use12->id,
        ]);

        $estudiante13 = Estudiante::create([
            'edad' => 6,
            'tipo_sanguineo' => 'O+',
            'alergias' => 'Ninguna',
            'idCurso' => $curso2A->id,
            'idU' => $use13->id,
        ]);

        $estudiante14 = Estudiante::create([
            'edad' => 6,
            'tipo_sanguineo' => 'O+',
            'alergias' => 'Ninguna',
            'idCurso' => $curso2A->id,
            'idU' => $use14->id,
        ]);

        $estudiante15 = Estudiante::create([
            'edad' => 6,
            'tipo_sanguineo' => 'O+',
            'alergias' => 'Ninguna',
            'idCurso' => $curso2A->id,
            'idU' => $use15->id,
        ]);

        $estudiante16 = Estudiante::create([
            'edad' => 6,
            'tipo_sanguineo' => 'O+',
            'alergias' => 'Ninguna',
            'idCurso' => $curso2B->id,
            'idU' => $use16->id,
        ]);

        $estudiante17 = Estudiante::create([
            'edad' => 6,
            'tipo_sanguineo' => 'O+',
            'alergias' => 'Ninguna',
            'idCurso' => $curso2B->id,
            'idU' => $use17->id,
        ]);

        $estudiante18 = Estudiante::create([
            'edad' => 6,
            'tipo_sanguineo' => 'O+',
            'alergias' => 'Ninguna',
            'idCurso' => $curso2B->id,
            'idU' => $use18->id,
        ]);

        $estudiante19 = Estudiante::create([
            'edad' => 6,
            'tipo_sanguineo' => 'O+',
            'alergias' => 'Ninguna',
            'idCurso' => $curso2B->id,
            'idU' => $use19->id,
        ]);

        $estudiante20 = Estudiante::create([
            'edad' => 6,
            'tipo_sanguineo' => 'O+',
            'alergias' => 'Ninguna',
            'idCurso' => $curso2B->id,
            'idU' => $use20->id,
        ]);

        //!! 20 padres

        $padre1 = User::create([
            'name' => 'Alejandro Martínez',
            'email' => 'padre1@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');

        $padre2 = User::create([
            'name' => 'Sofía Rodríguez',
            'email' => 'padre2@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');

        $padre3 = User::create([
            'name' => 'Carlos Rodríguez',
            'email' => 'padre3@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');

        $padre4 = User::create([
            'name' => 'María Martínez',
            'email' => 'padre4@gmai.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');

        $padre5 = User::create([
            'name' => 'Luis González',
            'email' => 'padre5@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');

        $padre6 = User::create([
            'name' => 'Laura González',
            'email' => 'padre6@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');

        $padre7 = User::create([
            'name' => 'Juan García',
            'email' => 'padre7@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');

        $padre8 = User::create([
            'name' => 'Andrea García',
            'email' => 'padre8@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');

        $padre9 = User::create([
            'name' => 'Pedro López',
            'email' => 'padre9@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');

        $padre10 = User::create([
            'name' => 'Natalia López',
            'email' => 'padre10@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');

        $padre11 = User::create([
            'name' => 'Gabriel Torres',
            'email' => 'padre11@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');

        $padre12 = User::create([
            'name' => 'Ana Pérez',
            'email' => 'padre12@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');

        $padre13 = User::create([
            'name' => 'Diego Cruz',
            'email' => 'padre13@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');

        $padre14 = User::create([
            'name' => 'Valentina Sánchez',
            'email' => 'padre14@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');

        $padre15 = User::create([
            'name' => 'Fernando Morales',
            'email' => 'padre15@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');
        
        $padre16 = User::create([
            'name' => 'Carmen Ramírez',
            'email' => 'padre16@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');
        
        $padre17 = User::create([
            'name' => 'Pablo Gómez',
            'email' => 'padre17@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');
        
        $padre18 = User::create([
            'name' => 'Lucía Díaz',
            'email' => 'padre18@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');
        
        $padre19 = User::create([
            'name' => 'Ricardo Hernández',
            'email' => 'padre19@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');
        
        $padre20 = User::create([
            'name' => 'Paula Fernández',
            'email' => 'padre20@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');
        
        $padre21 = User::create([
            'name' => 'Daniel Torres',
            'email' => 'padre21@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');
        
        $padre22 = User::create([
            'name' => 'Verónica Cruz',
            'email' => 'padre22@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');
        
        $padre23 = User::create([
            'name' => 'Antonio Ruiz',
            'email' => 'padre23@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');
        
        $padre24 = User::create([
            'name' => 'Patricia Morales',
            'email' => 'padre24@gmai.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');
        
        $padre25 = User::create([
            'name' => 'Sergio Vargas',
            'email' => 'padre25@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');
        
        $padre26 = User::create([
            'name' => 'Camila Gómez',
            'email' => 'padre26@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');
        
        $padre27 = User::create([
            'name' => 'Adrián Flores',
            'email' => 'padre27@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');
        
        $padre28 = User::create([
            'name' => 'Gabriela Hernández',
            'email' => 'padre28@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');
        
        $padre29 = User::create([
            'name' => 'Rafael Jiménez',
            'email' => 'padre29@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');
        
        $padre30 = User::create([
            'name' => 'Clara Torres',
            'email' => 'padre30@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');
        
        $padre31 = User::create([
            'name' => 'Óscar Palacios',
            'email' => 'padre31@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');
        
        $padre32 = User::create([
            'name' => 'Marta Ruiz',
            'email' => 'padre32@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');
        
        $padre33 = User::create([
            'name' => 'José Gonzales',
            'email' => 'padre33@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');
        
        $padre34 = User::create([
            'name' => 'Isabel Vargas',
            'email' => 'padre34@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');

        $padre35 = User::create([
            'name' => 'Martín Pomacusi',
            'email' => 'padre35@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');
        
        $padre36 = User::create([
            'name' => 'Elena Flores',
            'email' => 'padre36@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');
        
        $padre37 = User::create([
            'name' => 'Andrés Fernandez',
            'email' => 'padre37@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');
        
        $padre38 = User::create([
            'name' => 'Diana Jiménez',
            'email' => 'padre38@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');
        
        $padre39 = User::create([
            'name' => 'Ricardo Quispe',
            'email' => 'padre39@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');
        
        $padre40 = User::create([
            'name' => 'Marina Ortega',
            'email' => 'padre40@gmail.com',
            'password' => bcrypt('password'),
        ])->assignRole('Padre');
        



        $padr1 = Padre::create([
            'edad' => 45,
            'ci' => '13207116',
            'telefono' => '+591 71234567',
            'direccion' => 'Calle las americas #123',
            'idU' => $padre1->id,
        ]);

        $padr2 = Padre::create([
            'edad' => 45,
            'ci' => '13207316',
            'telefono' => '+591 71234557',
            'direccion' => 'Calle los olivos #123',
            'idU' => $padre2->id,
        ]);

        $padr3 = Padre::create([
            'edad' => 40,
            'ci' => '13207516',
            'telefono' => '+591 71234547',
            'direccion' => 'Avenida Bolívar #456',
            'idU' => $padre3->id,
        ]);
        
        $padr4 = Padre::create([
            'edad' => 42,
            'ci' => '13207716',
            'telefono' => '+591 71234537',
            'direccion' => 'Calle Libertad #789',
            'idU' => $padre4->id,
        ]);
        
        $padr5 = Padre::create([
            'edad' => 39,
            'ci' => '13207916',
            'telefono' => '+591 71234527',
            'direccion' => 'Avenida Los Robles #1011',
            'idU' => $padre5->id,
        ]);
        
        $padr6 = Padre::create([
            'edad' => 41,
            'ci' => '13208116',
            'telefono' => '+591 71234517',
            'direccion' => 'Calle San José #1213',
            'idU' => $padre6->id,
        ]);
        
        $padr7 = Padre::create([
            'edad' => 43,
            'ci' => '13208316',
            'telefono' => '+591 71234507',
            'direccion' => 'Avenida Las Flores #1415',
            'idU' => $padre7->id,
        ]);
        
        $padr8 = Padre::create([
            'edad' => 44,
            'ci' => '13208516',
            'telefono' => '+591 71234497',
            'direccion' => 'Calle Los Alamos #1617',
            'idU' => $padre8->id,
        ]);
        
        $padr9 = Padre::create([
            'edad' => 39,
            'ci' => '13208716',
            'telefono' => '+591 71234487',
            'direccion' => 'Avenida Las Palmeras #1819',
            'idU' => $padre9->id,
        ]);
        
        $padr10 = Padre::create([
            'edad' => 41,
            'ci' => '13208916',
            'telefono' => '+591 71234477',
            'direccion' => 'Calle Las Acacias #2021',
            'idU' => $padre10->id,
        ]);
        
        $padr11 = Padre::create([
            'edad' => 43,
            'ci' => '13209116',
            'telefono' => '+591 71234467',
            'direccion' => 'Avenida Los Cipreses #2223',
            'idU' => $padre11->id,
        ]);
        
        $padr12 = Padre::create([
            'edad' => 39,
            'ci' => '13209316',
            'telefono' => '+591 71234457',
            'direccion' => 'Calle Los Laureles #2425',
            'idU' => $padre12->id,
        ]);
        
        $padr13 = Padre::create([
            'edad' => 41,
            'ci' => '13209516',
            'telefono' => '+591 71234447',
            'direccion' => 'Avenida Las Rosas #2627',
            'idU' => $padre13->id,
        ]);
        
        $padr14 = Padre::create([
            'edad' => 43,
            'ci' => '13209716',
            'telefono' => '+591 71234437',
            'direccion' => 'Calle Los Pinos #2829',
            'idU' => $padre14->id,
        ]);
        
        $padr15 = Padre::create([
            'edad' => 44,
            'ci' => '13209916',
            'telefono' => '+591 71234427',
            'direccion' => 'Avenida Los Sauces #3031',
            'idU' => $padre15->id,
        ]);
        
        $padr16 = Padre::create([
            'edad' => 39,
            'ci' => '13210116',
            'telefono' => '+591 71234417',
            'direccion' => 'Calle Las Orquídeas #3233',
            'idU' => $padre16->id,
        ]);
        
        $padr17 = Padre::create([
            'edad' => 41,
            'ci' => '13210316',
            'telefono' => '+591 71234407',
            'direccion' => 'Avenida Los Lirios #3435',
            'idU' => $padre17->id,
        ]);
        
        $padr18 = Padre::create([
            'edad' => 43,
            'ci' => '13210516',
            'telefono' => '+591 71234397',
            'direccion' => 'Calle Las Dalias #3637',
            'idU' => $padre18->id,
        ]);
        
        $padr19 = Padre::create([
            'edad' => 44,
            'ci' => '13210716',
            'telefono' => '+591 71234387',
            'direccion' => 'Avenida Las Azucenas #3839',
            'idU' => $padre19->id,
        ]);
        
        $padr20 = Padre::create([
            'edad' => 40,
            'ci' => '13210916',
            'telefono' => '+591 71234377',
            'direccion' => 'Calle Los Tulipanes #4041',
            'idU' => $padre20->id,
        ]);
        
        $padr21 = Padre::create([
            'edad' => 42,
            'ci' => '13211116',
            'telefono' => '+591 71234367',
            'direccion' => 'Avenida Las Margaritas #4243',
            'idU' => $padre21->id,
        ]);
        
        $padr22 = Padre::create([
            'edad' => 39,
            'ci' => '13211316',
            'telefono' => '+591 71234357',
            'direccion' => 'Calle Las Hortensias #4445',
            'idU' => $padre22->id,
        ]);
        
        $padr23 = Padre::create([
            'edad' => 41,
            'ci' => '13211516',
            'telefono' => '+591 71234347',
            'direccion' => 'Avenida Los Girasoles #4647',
            'idU' => $padre23->id,
        ]);
        
        $padr24 = Padre::create([
            'edad' => 43,
            'ci' => '13211716',
            'telefono' => '+591 71234337',
            'direccion' => 'Calle Las Violetas #4849',
            'idU' => $padre24->id,
        ]);
        
        $padr25 = Padre::create([
            'edad' => 44,
            'ci' => '13211916',
            'telefono' => '+591 71234327',
            'direccion' => 'Avenida Los Narcisos #5051',
            'idU' => $padre25->id,
        ]);
        
        $padr26 = Padre::create([
            'edad' => 40,
            'ci' => '13212116',
            'telefono' => '+591 71234317',
            'direccion' => 'Calle Los Cactus #5253',
            'idU' => $padre26->id,
        ]);
        
        $padr27 = Padre::create([
            'edad' => 42,
            'ci' => '13212316',
            'telefono' => '+591 71234307',
            'direccion' => 'Avenida Las Orquídeas #5455',
            'idU' => $padre27->id,
        ]);
        
        $padr28 = Padre::create([
            'edad' => 39,
            'ci' => '13212516',
            'telefono' => '+591 71234297',
            'direccion' => 'Calle Las Palmas #5657',
            'idU' => $padre28->id,
        ]);
        
        $padr29 = Padre::create([
            'edad' => 41,
            'ci' => '13212716',
            'telefono' => '+591 71234287',
            'direccion' => 'Avenida Las Camelias #5859',
            'idU' => $padre29->id,
        ]);
        
        $padr30 = Padre::create([
            'edad' => 43,
            'ci' => '13212916',
            'telefono' => '+591 71234277',
            'direccion' => 'Calle Los Sauces #6061',
            'idU' => $padre30->id,
        ]);

        $padr31 = Padre::create([
            'edad' => 44,
            'ci' => '13213116',
            'telefono' => '+591 71234267',
            'direccion' => 'Avenida Las Magnolias #6263',
            'idU' => $padre31->id,
        ]);
        
        $padr32 = Padre::create([
            'edad' => 40,
            'ci' => '13213316',
            'telefono' => '+591 71234257',
            'direccion' => 'Calle Los Abedules #6465',
            'idU' => $padre32->id,
        ]);
        
        $padr33 = Padre::create([
            'edad' => 42,
            'ci' => '13213516',
            'telefono' => '+591 71234247',
            'direccion' => 'Avenida Las Begonias #6667',
            'idU' => $padre33->id,
        ]);
        
        $padr34 = Padre::create([
            'edad' => 39,
            'ci' => '13213716',
            'telefono' => '+591 71234237',
            'direccion' => 'Calle Las Gardenias #6869',
            'idU' => $padre34->id,
        ]);
        
        $padr35 = Padre::create([
            'edad' => 41,
            'ci' => '13213916',
            'telefono' => '+591 71234227',
            'direccion' => 'Avenida Las Hortensias #7071',
            'idU' => $padre35->id,
        ]);
        
        $padr36 = Padre::create([
            'edad' => 43,
            'ci' => '13214116',
            'telefono' => '+591 71234217',
            'direccion' => 'Calle Los Jazmines #7273',
            'idU' => $padre36->id,
        ]);
        
        $padr37 = Padre::create([
            'edad' => 44,
            'ci' => '13214316',
            'telefono' => '+591 71234207',
            'direccion' => 'Avenida Los Lirios #7475',
            'idU' => $padre37->id,
        ]);
        
        $padr38 = Padre::create([
            'edad' => 40,
            'ci' => '13214516',
            'telefono' => '+591 71234197',
            'direccion' => 'Calle Las Margaritas #7677',
            'idU' => $padre38->id,
        ]);
        
        $padr39 = Padre::create([
            'edad' => 42,
            'ci' => '13214716',
            'telefono' => '+591 71234187',
            'direccion' => 'Avenida Las Orquídeas #7879',
            'idU' => $padre39->id,
        ]);
        
        $padr40 = Padre::create([
            'edad' => 39,
            'ci' => '13214916',
            'telefono' => '+591 71234177',
            'direccion' => 'Calle Los Tulipanes #8081',
            'idU' => $padre40->id,
        ]);
        
        
        PadreEstudiante::create([
            'padreId' => $padre1->id,
            'estudianteId' => $use1->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre2->id,
            'estudianteId' => $use1->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre3->id,
            'estudianteId' => $use2->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre4->id,
            'estudianteId' => $use2->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre5->id,
            'estudianteId' => $use3->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre6->id,
            'estudianteId' => $use3->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre7->id,
            'estudianteId' => $use4->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre8->id,
            'estudianteId' => $use4->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre9->id,
            'estudianteId' => $use5->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre10->id,
            'estudianteId' => $use5->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre11->id,
            'estudianteId' => $use6->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre12->id,
            'estudianteId' => $use6->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre13->id,
            'estudianteId' => $use7->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre14->id,
            'estudianteId' => $use7->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre15->id,
            'estudianteId' => $use8->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre16->id,
            'estudianteId' => $use8->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre17->id,
            'estudianteId' => $use9->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre18->id,
            'estudianteId' => $use9->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre19->id,
            'estudianteId' => $use10->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre20->id,
            'estudianteId' => $use10->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre21->id,
            'estudianteId' => $use11->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre22->id,
            'estudianteId' => $use11->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre23->id,
            'estudianteId' => $use12->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre24->id,
            'estudianteId' => $use12->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre25->id,
            'estudianteId' => $use13->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre26->id,
            'estudianteId' => $use13->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre27->id,
            'estudianteId' => $use14->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre28->id,
            'estudianteId' => $use14->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre29->id,
            'estudianteId' => $use15->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre30->id,
            'estudianteId' => $use15->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre31->id,
            'estudianteId' => $use16->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre32->id,
            'estudianteId' => $use16->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre33->id,
            'estudianteId' => $use17->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre34->id,
            'estudianteId' => $use17->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre35->id,
            'estudianteId' => $use18->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre36->id,
            'estudianteId' => $use18->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre37->id,
            'estudianteId' => $use19->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre38->id,
            'estudianteId' => $use19->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre39->id,
            'estudianteId' => $use20->id,
        ]);

        PadreEstudiante::create([
            'padreId' => $padre40->id,
            'estudianteId' => $use20->id,
        ]);
    }
}
