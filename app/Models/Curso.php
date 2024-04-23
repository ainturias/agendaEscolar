<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;



    use HasFactory;
    protected $table = 'cursos';


    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class, 'idCurso');
    }

    public function materias()
    {
        return $this->belongsToMany(Materia::class, 'curso_materias', 'idCurso', 'idMateria');
    }

}
