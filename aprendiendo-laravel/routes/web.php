<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\FrutaController;

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

/* Esta es unaruta basica y lo que se hace aca es que me devuelve una vista */
/* Tambien podemos devolver HTML por ejemplo: echo "<h1>Hola Mundo</h1>"; */

Route::get('/', function () {
    return view('welcome');
});

// Como puedo usar un controlador dentro de las rutas
// Aca se usa el Controlador y el metodo index
Route::get('/peliculas/{pagina?}', [PeliculaController::class, 'index'])->name('pelicula.index');

// Aca se usa el Controlador y el metodo detalle
// Route::get('/detalle', [PeliculaController::class, 'detalle']);
// Le definimos un nombre a esta ruta ya que no tiene cuando se miran desde el comando: php artisan route:list
Route::get('/detalle/{year?}', [PeliculaController::class, 'detalle'])
    ->name('pelicula.detalle')
    ->middleware('testyear');

// Creamos la ruta de la redirección
Route::get('/redirigir', [PeliculaController::class, 'redirigir'])->name('pelicula.redirigir');

// Creamos la ruta del formulario
Route::get('/formulario', [PeliculaController::class, 'formulario'])->name('pelicula.formulario');

// Creamos la ruta de recibir para llamar la accion de recibir del controlador
Route::post('/recibir', [PeliculaController::class, 'recibir'])->name('pelicula.recibir');

// Aca se usa el Controlador Resource de UsuarioController
Route::resource('usuario', UsuarioController::class);

// Rutas de Fruta
Route::group(['prefix'=>'frutas'], function() {
    Route::get('index', [FrutaController::class, 'index']);
    Route::get('detail/{id}', [FrutaController::class, 'detail']);
    Route::get('crear', [FrutaController::class, 'create']);
    Route::post('save', [FrutaController::class, 'save']);
    Route::get('delete/{id}', [FrutaController::class, 'delete']);
    Route::get('editar/{id}', [FrutaController::class, 'edit']);
    Route::post('update', [FrutaController::class, 'update']);
});

/* Normalmente las ruta de la aplicación se tiene aca, si se desarrolla una Api deben de definirse en el archivo api.php */
/* Aca se pueden definir todas las rutas con todos los metodos HTTP
    Metodos:
    GET: Conseguir Datos
    POST: Guardar Datos
    PUT: Actualizar Datos
    DELETE: Eliminar Datos
*/

/** Definimos aca un ruta de ejemplo */
/* Route::get('/mostrar-fecha', function() {
    // Le podemos enviar parametros a una vista
    $titulo = "Estoy mostrando la fecha";
    return view('mostrar-fecha', array(
        'titulo' => $titulo
    ));
});
*/

/* Definimos una ruta para saber como se le envia un parametro desde la URL */
/* En la funcion definimos el parametro que recojemos */
/* Route::get('/pelicula/{titulo}', function($titulo) {
    return view('pelicula', array(
        'titulo' => $titulo
    ));
}); */

/* Si definimos que el titulo es opcional con ello se le adicion el simbolo ? y en la funcion le ponemos una valor por defecto */
/* Route::get('/pelicula/{titulo?}', function($titulo = 'No hay una pelicula seleccionada') {
    return view('pelicula', array(
        'titulo' => $titulo
    ));
}); */

/* Tambien dentro de Laravel en las rutas puedo hacer condiciones, por ejemplo que si se cunple la condición me permita ingresar a la ruta o no */
/* Route::get('/pelicula/{titulo}', function($titulo) {
    return view('pelicula', array(
        'titulo' => $titulo
    ));
})->where(array(
    // Aca se ponen las condiciones, un ejemplo es que todos los caracteres sean minusculas
    // Se permite texto en minuscula y repetidas veces por ello el +
    // Si se manda por ejemplo como parametro holaA no me carga la rura
    // Como ahora se le incluyen mayusculas entonces el holaA lo permite pero si le envio un numero no funciona la ruta
    'titulo' => '[a-zA-Z]+'
)); */

/* Adicionamos otro parametro mas para la URL */
/* La ruta funciona para cuando se cumplan las dos condiciones del titulo y que el año sea numerico */
/* Route::get('/pelicula/{titulo}/{year?}', function($titulo = 'No hay una pelicula seleccionada', $year = 2025) {
    return view('pelicula', array(
        'titulo' => $titulo,
        'year' => $year
    ));
})->where(array(
    'titulo' => '[a-zA-Z]+',
    'year' => '[0-9]+'
));
*/

/* Creamos una nueva ruta para ver mas detalles del manejo de las vistas */
/* Route::get('/listado-peliculas', function() {
    $titulo = "Listado de películas";
    $listado = array('Batman','Spiderman', 'Gran Torino');
    // Como la vista de listado esta dentro de la carpeta de peliculas se realiza el llamado así: peliculas.listado
    // return view('peliculas.listado', array(
    //    'titulo' => $titulo
    //));
    // Otra manera de enviar parametros a una vista se define así:
    return view('peliculas.listado')
                ->with('titulo', $titulo)
                ->with('listado', $listado);
});
*/

/* Plantilla base o layuot */
/*Route::get('pagina-generica', function() {
    return view('pagina');
});
*/
