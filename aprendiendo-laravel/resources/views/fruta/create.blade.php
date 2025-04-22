<!-- Se realizan unos ajustes al formulario para que no solo funcione para Crear sino para Editar tambien -->
@if(isset($fruta) && is_object($fruta))
    <h1>Editar Fruta</h1>
@else
    <h1>Crear una Fruta</h1>
@endif

<form action="{{ isset($fruta) ? action([App\Http\Controllers\FrutaController::class, 'update']) : action([App\Http\Controllers\FrutaController::class, 'save']) }}" method="POST">
    @csrf

    @if(isset($fruta) && is_object($fruta))
        <input type="hidden" name="id" value="{{ $fruta->id }}">
    @endif

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="{{ $fruta->nombre ?? '' }}">
    <br>
    <label for="descripcion">Descripción</label>
    <input type="text" name="descripcion" value="{{ $fruta->descripcion ?? '' }}">
    <br>
    <label for="precio">Precio</label>
    <input type="number" name="precio" value="{{ $fruta->precio ?? 0 }}">
    <br>
    <input type="submit" name="Guardar">
</form>
