<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    // 1. Le indicams a esta entidada que tabla esta modificando
    protected $table = 'images';

    // 2. Hacemos una relación de 1 a muchos (One to Many).
    // Una imagen va a tener muchos comentarios
    // Con este metodo obtenemps todos los comentarios que tiene una imgane.
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    // Creamos otra relación One to Many con los likes
    // En hasMany le decimos con que elemento se va a relacionar. Este objeto me saca todos los likes de la imagen.
    public function likes(){
        return $this->hasMany('App\Models\Like');
    }

    // Realación de Muchos a uno.
    // Configuramos otra relación para sacar el usuario que ha creado la imagen.
    // Esta relación es diferente por muchas imagenes pueden tener un unico creador (Relacion de Muchos a uno).
    public function user(){
        // En belongsTo se indica primero con que tabla me relaciono y el campo con el cual se va a relacionar.
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}
