<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
// Para probar el ORM hacemos uso de la clase ne este caso image
Use App\Models\Image;

Route::get('/', function () {

    // Con esto traemos todas las imagenes que tenemos en la base de datos
    $images = Image::all();
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

    return view('welcome');
});
*/

/*
Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Con la instalación de Breeze me deja /dashboard, se le guita dashboard y me deja ya en la pagina de login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/user/avatar/{filename}', [ProfileController::class, 'getImage'])->name('user.avatar');
});

require __DIR__.'/auth.php';
