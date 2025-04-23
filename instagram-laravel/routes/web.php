<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Para probar el ORM hacemos uso de la clase ne este caso image
// Use App\Models\Image;

Route::get('/', function () {

    // Con esto traemos todas las imagenes que tenemos en la base de datos
    /*$images = Image::all();
    foreach($images as $image) {
        //var_dump($image);
        echo $image->image_path."<br>";
        echo $image->description."<br>";
        // Si yo quiero sacar el usuario que ha creado esta imagen
        echo $image->user->name.' '.$image->user->surname."<br>";
        // Tambien quiero mostrar los comentarios que ha tenido esa imagen
        if (count($image->comments) >= 1) {
            echo '<h4>Comentarios</h4>';
            foreach($image->comments as $comment){
                echo $comment->user->name.' '.$comment->user->surname.": ";
                echo $comment->content."<br>";
            }
        }
        // Tambien podriamos sacar la cantidad de likes.
        echo 'LIKES: '.count($image->likes);
        echo "<hr>";
    }

    die();
    */
    return view('welcome');
});
