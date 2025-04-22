<h1>Lista de Frutas</h1>

<h3><a href="{{ action([App\Http\Controllers\FrutaController::class, 'create']) }}">Crear Fruta</a></h3>

<!-- Mostramos aca la sesion -->
@if(session('status'))
    <p style="background: green; color:white;">
        {{session('status')}}
    </p>
@endif

<ul>
    @foreach($frutas as $fruta)
        <!-- Aca podemos colocar un link -->
        <li>
        <a href="{{ action([App\Http\Controllers\FrutaController::class, 'detail'], ['id' => $fruta->id]) }}">
            {{ $fruta->nombre }}
        </a>
        </li>
    @endforeach
</ul>
