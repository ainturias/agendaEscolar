<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $table = 'estudiantes';
    protected $primaryKey = 'idU';
    protected $fillable = ['idU', 'edad', 'tipo_sanguineo', 'alergias', 'idCurso'];

    public function user()
    {
        return $this->belongsTo(User::class, 'idU', 'id');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'idCurso');
    }

    public function padres()
    {
        return $this->belongsToMany(Padre::class, 'padre_estudiantes', 'estudianteId', 'padreId');
    }

}
