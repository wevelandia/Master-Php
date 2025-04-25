<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    /* Acá adicionamos nuevos campos de surname y nick.
       y en el metodo de create del controlador RegisteredUserController
       se adicionan esos dos campos para porderlo alamacenar en la tabla */
    protected $fillable = [
        'role',
        'name',
        'surname',
        'nick',
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

    // Con esto sacamos las imagenes de un determinado usuario.
    public function images(){
        return $this->hasMany('App\Models\Images');
    }

}
