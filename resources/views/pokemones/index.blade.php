@extends('layouts.app')

@section('content')
    <main>
        @foreach ($pokemon as $poke)
            <p>{{ $poke->nombre }}</p>
            <p>{{ $poke->habilidad1 }}</p>
            <p>{{ $poke->habilidad2 }}</p>
            @if ($poke->imagen)
                <img src="{{ Storage::url($poke->imagen) }}" alt="Imagen del pokemon">
            @endif
            <a href="{{ route('pokemones.edit', $poke->id) }}">Editar</a>
            <form action="{{ route('pokemones.destroy', $poke->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>
        @endforeach
    </main>
@endsection
