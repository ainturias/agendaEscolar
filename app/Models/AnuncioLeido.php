<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnuncioLeido extends Model
{
    use HasFactory;
    protected $table = 'anuncio_leidos';
    protected $fillable = ['anuncioId', 'userId', 'leido'];
}
