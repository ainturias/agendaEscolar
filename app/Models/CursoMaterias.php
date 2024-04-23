<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CursoMaterias extends Model
{
    use HasFactory;
    protected $table = 'curso_materias';
    protected $fillable = ['idCurso', 'idMateria'];
}
