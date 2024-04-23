<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventoCalendario extends Model
{
    use HasFactory;
    protected $table = 'evento_calendarios';
    protected $primaryKey = 'id';
    protected $fillable = ['idU', 'title', 'start', 'end'];
}
