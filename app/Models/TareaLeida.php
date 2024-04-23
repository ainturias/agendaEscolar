<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TareaLeida extends Model
{
    use HasFactory;

    protected $table = 'tarea_leidas';
    protected $fillable = ['tareaId', 'userId', 'leido'];
    
}
