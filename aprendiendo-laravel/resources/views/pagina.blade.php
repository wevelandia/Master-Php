<!-- Aca heredo mi plantilla maestra -->
@extends('layouts.master')

<!-- Sustituimos el titulo en nuestro master -->
@section('titulo', 'Master en PHP')

<!-- Heredamos de nuestro master y le agregamos contenido -->
<!-- Si dejamos así como esta, lo que hace es que nos cambia el texto que tenemos en header  -->
{{--
@section('header')
    <h2>Hola</h2>
@stop
--}}

<!-- Para poder adicionar contenido al header usamos @parent  -->
@section('header')
    @parent
    <h2>Hola desde la vista hija</h2>
@endsection

<!-- Sustituimos el contenido de esta pagina en nuestro master -->
@section('content')
    <h1>Contendio de la pagina generica</h1>
@stop
