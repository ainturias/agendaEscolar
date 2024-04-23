<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    protected $table = 'materias';


        public function cursos()
        {
            return $this->belongsToMany(Curso::class, 'curso_materias', 'idMateria', 'idCurso');
        }


        // Definición de la relación uno a muchos inversa con la tabla 'profesors'
        public function profesor()
        {
            return $this->belongsTo(Profesor::class, 'idProfesor'); // La clave foránea es 'idProfesor'
        }

        public function tareas()
        {
            return $this->hasMany(Tarea::class, 'materiaId', 'id');
        }


}
