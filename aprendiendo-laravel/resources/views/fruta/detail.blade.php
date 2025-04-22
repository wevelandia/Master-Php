<h1>{{$fruta->nombre}}</h1>
<p>
    {{$fruta->descripcion}}
</p>

<a href="{{ action([App\Http\Controllers\FrutaController::class, 'delete'], ['id' => $fruta->id]) }}">Eliminar</a>
<a href="{{ action([App\Http\Controllers\FrutaController::class, 'edit'], ['id' => $fruta->id]) }}">Crear Fruta</a>
