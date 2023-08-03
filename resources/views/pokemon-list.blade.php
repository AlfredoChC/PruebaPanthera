<main>
<h1> Pokemon de la base de datos</h1>
<br>
<a href="{{ route('pokemones.create') }}">Crear Nuevo Pokémon</a>
<br>
<a href="{{ url('/') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"> Regresar a Pokemon de la API</a>

    @foreach ($pokemon as $poke)
        <h3> Nombre: </h3>
        <p>{{ $poke->nombre }}</p>
        <h3> Habilidades: </h3>
        <p>{{ $poke->habilidad1 }}</p>
        <p>{{ $poke->habilidad2 }}</p>
        <h3> Aspecto: </h3>
        @if ($poke->imagen)
            <img src="{{ Storage::url($poke->imagen) }}" alt="Imagen del pokemon">
        @endif
        <br>
        <a href="{{ route('pokemones.edit', $poke->id) }}">Editar</a>
        <form action="{{ route('pokemones.destroy', $poke->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
    @endforeach
</main>
