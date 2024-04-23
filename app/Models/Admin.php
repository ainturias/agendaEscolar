<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';
    
    public function user()
    {
        return $this->belongsTo(User::class, 'idU', 'id');
    }

    public function anuncios()
    {
        return $this->hasMany(Anuncio::class, 'adminId', 'idU');
    }
}
