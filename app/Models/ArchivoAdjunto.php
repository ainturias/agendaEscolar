<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ArchivoAdjunto extends Model
{
    use HasFactory;
    protected $table = 'archivo_adjuntos';
    protected $guarded = [];

    public function modeloMain(): MorphTo
    {
        return $this->morphTo();
    }
}
