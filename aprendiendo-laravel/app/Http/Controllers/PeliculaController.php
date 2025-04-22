<?php

/* Indica el espacio de nombres de la clase, que en Laravel organiza el código.
  -Todos los controladores por defecto están en App\Http\Controllers. */
namespace App\Http\Controllers;

/* Importa la clase Request que Laravel usa para manejar las solicitudes HTTP (datos de formularios, parámetros, headers, etc.). */
use Illuminate\Http\Request;

/* Importamos la clase Rweques de Laravel */
//use Illuminate\Support\Facades\Request;

/* Crea la clase PeliculaController, que hereda de la clase base Controller de Laravel.
Esto le permite usar características como middleware, validación, respuestas JSON, etc.*/
class PeliculaController extends Controller
{
    // Un controlador tiene acciones.
    // Aca definimos una accion que retorna una vista.
    public function index($pagina = 1) {
        $titulo = 'Listado de mis peliculas';
        // Retornamos la vista y se le envia parametros como arreglo.
        return view('pelicula.index', [
            'titulo' => $titulo,
            'pagina' => $pagina
        ]);
    }

    public function detalle($year = null) {
        //echo "<h1>Detalle de la pelicula</h1>";
        // Para que no solicite una vista y no pida nada
        //die();
        return view('pelicula.detalle');
    }

    // Creamos otro metodo para ver como se redirecciona
    public function redirigir() {
        // Funciona así para cuando se tiene el nombre
        //return redirect()->route('pelicula.detalle');
        // O funciona así con la url directa
        return redirect('/peliculas');
    }

    // Creamos una accion nueva
    public function formulario() {
        // Cargamos una vista
        return view('pelicula.formulario');
    }

    // Creamos una accion para recibir los datos del formulario
    public function recibir(Request $request) {
        $nombre = $request->input('nombre');
        $email = $request->input('email');

        //var_dump($nombre);
        //die();
        return "El nombre es: $nombre y el email es: $email";
    }
}
