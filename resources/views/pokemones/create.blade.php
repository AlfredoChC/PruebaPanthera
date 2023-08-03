<main>
    <h1>Crear Nuevo Pokémon</h1>

    <form id="pokemon-form" action="{{ route('pokemones.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">

        <label for="habilidad1">Habilidad 1:</label>
        <input type="text" name="habilidad1" id="habilidad1">

        <label for="habilidad2">Habilidad 2:</label>
        <input type="text" name="habilidad2" id="habilidad2">

        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen">

        <button type="submit">Crear Pokémon</button>
    </form>
    <script>
        document.getElementById('pokemon-form').addEventListener('submit', function(event) {
            // Obtener el valor del campo de imagen
            const imagenInput = document.getElementById('imagen');
            const imagen = imagenInput.files[0];
    
            // Si no se ha seleccionado una imagen, evitar que el formulario se envíe y mostrar un mensaje de error
            if (!imagen) {
                event.preventDefault();
                alert('Debes adjuntar una imagen antes de crear el Pokémon.');
            }
        });
    </script>
    
</main>