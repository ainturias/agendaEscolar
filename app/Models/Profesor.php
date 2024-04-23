<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Materia;
use App\Models\User;


class Profesor extends Model
{
    use HasFactory;
    protected $table = 'profesors';
    protected $primaryKey = 'idU';
    protected $fillable = ['idU', 'edad', 'direccion', 'telefono'];

    public function user()
    {
        return $this->belongsTo(User::class, 'idU', 'id');
    }


    // Definición de la relación uno a muchos con la tabla 'materias'
    public function materias()
    {
        return $this->hasMany(Materia::class, 'idProfesor'); // La clave foránea es 'idProfesor'
    }

    public function tareas()
    {
        return $this->hasMany(Tarea::class, 'profesorId', 'idU');
    }
}
