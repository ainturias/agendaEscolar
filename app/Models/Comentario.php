<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    protected $table = 'comentarios';
    protected $fillable = ['contenido', 'tareaId', 'userId', 'fecha'];

    public function tarea()
    {
        return $this->belongsTo(Tarea::class, 'tareaId');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'UserId');
    }
}
