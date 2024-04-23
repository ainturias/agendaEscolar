<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
 


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function padre()
    {
        return $this->hasOne(Padre::class, 'idU', 'id');
    }

    public function profesor()
    {
        return $this->hasOne(Profesor::class, 'idU', 'id');
    }

    public function admin()
    {
        return $this->hasOne(Admin::class, 'idU', 'id');
    }

    public function Estudiante()
    {
        return $this->hasOne(Estudiante::class, 'idU', 'id');
    }

    public function anunciosLeidos()
    {
        return $this->belongsToMany(Anuncio::class, 'anuncio_leidos', 'userId', 'anuncioId')
                    ->withPivot('leido')
                    ->withTimestamps();
    }

    public function tareasLeidas()
    {
        return $this->belongsToMany(Tarea::class, 'tarea_leidas', 'userId', 'tareaId');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'UserId');
    }
}
