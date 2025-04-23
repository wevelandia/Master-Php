<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    // Relacion de muchos a uno.
    public function user(){
        // En belongsTo se indica primero con que tabla me relaciono y el campo con el cual se va a relacionar.
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    // Relacion de muchos a uno.
    public function image(){
        // En belongsTo se indica primero con que tabla me relaciono y el campo con el cual se va a relacionar.
        return $this->belongsTo('App\Models\Image', 'image_id');
    }
}
