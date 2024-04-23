<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Anuncio extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'contenido', 'startDate', 'endDate', 'adminId'];
    protected $table = 'anuncios';
    

    public function usuariosQueLoLeen()
    {
        return $this->belongsToMany(User::class, 'anuncio_leidos', 'anuncioId', 'userId')
                    ->withPivot('leido')
                    ->withTimestamps();
    }

    public function archivos(): MorphMany
    {
        return $this->morphMany(ArchivoAdjunto::class, 'archivoAdjunto');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'adminId', 'idU');
    }

}
