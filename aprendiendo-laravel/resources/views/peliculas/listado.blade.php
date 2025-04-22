<!-- INCLUIR OTRAS VISTAS -->
@include('includes.header')

<!-- IMPRIMIR POR PANTALLA -->
<h1>{{$titulo}}</h1>
<h2>{{$listado[2]}}</h2>
<!-- Otra manera de imprimir con blade funciones de PHP -->
<p>{{ date('Y') }}</p>


<!-- COMENTARIOS -->
<!-- Esto es un comentario en HTML -->
<?php
    // Este es un comentario en PHP
?>

{{-- Este es un comentario en BLADE --}}


<!-- MOSTRAR SI EXISTE -->

{{-- En PHP se hacia esto --}}
<?= isset($director) ? $director : 'No hay director'; ?>

<br>

{{-- En BLADE se hace esto --}}
{{ $director ?? 'No hay ningun director' }}

<br>

<!-- CONDICIONEALES -->
<!-- @if($titulo)
    <h1>El titulo existe y es este: {{ $titulo }}</h1>
@else
    <h1>El titulo no existe</h1>
@endif -->

<!-- @if( $titulo && count($listado) > 5 )
    <h1>El titulo existe y es este: {{ $titulo }} y el listado es mayor a 5</h1>
@else
    <h1>La condición no se ha cumplido</h1>
@endif -->

@if( $titulo && count($listado) > 5 )
    <h1>El titulo existe y es este: {{ $titulo }} y el listado es mayor a 5</h1>
@elseif ($titulo)
    <h1>El titulo existe y el listado no es mayor a 5</h1>
@else
    <h1>El titulo no existe</h1>
@endif

<br>

<!-- BUCLES -->
@for($i =  0; $i <= 20; $i++)
    El número es: {{ $i }}<br>
@endfor

<hr>

<?php $contador = 1; ?>
@while($contador < 50)
    @if ($contador % 2 == 0)
        NUMERO PAR: {{ $contador }}<br>
    @endif
    <?php $contador++; ?>
@endwhile

<hr>

@foreach($listado as $pelicula)
    <p>{{ $pelicula }}</p>
@endforeach

@include('includes.footer')
