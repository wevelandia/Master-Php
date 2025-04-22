<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrutaController extends Controller
{
    // Creamos el primer metodo index que va a tener un listado de Frutas
    //public function index() {
    //    // Esta instrucción es como un Select * from frutas y emretorna un array
    //    $frutas = DB::table('frutas')->get();
    //    // Retornamos una vista
    //    return view('fruta.index', [
    //        'frutas' => $frutas
    //    ]);
    //}

    public function index() {
        // Ahora mostramos los registros pero le adicionamos un order by
        $frutas = DB::table('frutas')
            ->orderBy('id', 'desc')
            ->get();
        // Retornamos una vista
        return view('fruta.index', [
            'frutas' => $frutas
        ]);
    }

    // Creamos otro metodo detalle
    public function detail($id) {
        // En esta definición el where lleva 3 segmentos: el primero el id que se va a evaluar, el segundo el operador y el tercero es el id que llega por parametro
        $fruta = DB::table('frutas')->where('id', '=', $id)->first();

        //var_dump($fruta);
        //die();

        // Retornamos una vista
        return view('fruta.detail', [
            'fruta' => $fruta
        ]);
    }

    // Creamos otro metodo para crear una fruta
    public function create() {
        return view('fruta.create');
    }

    // Creamos el metodo para guardar el registro y este metodo se llama en el action del formulario.
    public function save(Request $request) {
        // Guardamos el registro
        $fruta = DB::table('frutas')->insert(array(
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'precio' => $request->input('precio'),
            'fecha' => Date('Y-m-d')
        ));

        // Redirigimos a otra vista u enviamos una sesion con el nombre de status
        return redirect('/frutas/index')->with('status', 'Fruta creada correctamente');
    }

    // Creamos otro metodo para borrar una fruta
    public function delete($id) {
        $fruta =  DB::table('frutas')->where('id', $id)->delete();
        // Redirigimos a index, y le pasamos un dato o sesion y en este caso con el nombre status
        return redirect('/frutas/index')->with('status', 'Fruta borrada correctamente');
    }

    // Creamos otro metodo para editar una fruta
    public function edit($id) {
        // Sacamos el registro de la Base de Datos
        $fruta = DB::table('frutas')->where('id', $id)->first();

        // Pasar a la vista el objeto y rellenar el formulario
        return view('fruta.create', [
            'fruta' => $fruta
        ]);
    }

    // Creamos el metodo para actualziar
    public function update(Request $request) {
        $id = $request->input('id');

        $fruta = DB::table('frutas')->where('id', $id)
                                    ->update(array(
                                        'nombre' => $request->input('nombre'),
                                        'descripcion' => $request->input('descripcion'),
                                        'precio' => $request->input('precio'),
                                    ));

        return redirect('/frutas/index')->with('status', 'Fruta actualizada correctamente');

    }

}
