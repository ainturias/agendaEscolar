<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Tarea extends Model
{
    use HasFactory;
    protected $table = 'tareas';
    protected $guarded = [];
    protected $primaryKey = 'id';

    public function archivos(): MorphMany
    {
        return $this->morphMany(ArchivoAdjunto::class, 'archivoAdjunto');
    }


    public function usersQueHanLeido()
    {
        return $this->belongsToMany(User::class, 'tarea_leidas', 'tareaId', 'userId');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'tareaId');
    }
    public function materia()
    {
        return $this->belongsTo(Materia::class, 'materiaId', 'id');
    }

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'profesorId', 'idU');
    }
}
