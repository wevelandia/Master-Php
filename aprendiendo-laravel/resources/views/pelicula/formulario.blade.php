<h1>Formulario en Laravel</h1>
<form action="{{ route('pelicula.recibir') }}" method="POST">
    {{ csrf_field() }}
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre">

    <br>

    <label for="email">Correo</label>
    <input type="text" name="email">

    <br>

    <input type="submit" name="enviar">
</form>
