<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Padre extends Model
{
    use HasFactory;
    protected $table = 'padres';
    protected $fillable = ['idU', 'edad', 'ci', 'telefono', 'direccion'];
    protected $primaryKey = 'idU';

    public function user()
    {
        return $this->belongsTo(User::class, 'idU', 'id');
    }

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class, 'padre_estudiantes', 'padreId', 'estudianteId');
    }
 

}
