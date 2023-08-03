<!-- edit.blade.php -->
<form action="{{ route('pokemones.update', $pokemon->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="nombre" value="{{ $pokemon->nombre }}" required>
    <input type="text" name="habilidad1" value="{{ $pokemon->habilidad1 }}" required>
    <input type="text" name="habilidad2" value="{{ $pokemon->habilidad2 }}" required>
    @if ($pokemon->imagen)
        <img src="{{ Storage::url($pokemon->imagen) }}" alt="Imagen del personaje">
    @endif
    <input type="file" name="imagen">
    <button type="submit">Guardar cambios</button>
</form>
