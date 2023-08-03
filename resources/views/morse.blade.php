<!DOCTYPE html>
<html>
<head>
    <title>Morse a Texto</title>
</head>
<body>
    <h1>Morse a Texto</h1>

    <form method="POST" action="{{ route('morse.translate') }}">
        @csrf
        <label for="morseMessage">Mensaje en Morse:</label>
        <input type="text" id="morseMessage" name="morseMessage" required>
        <button type="submit">Decodificar</button>
    </form>

    @if(isset($decodedMessage))
        <h2>Mensaje Decodificado:</h2>
        <p>{{ $decodedMessage }}</p>
    @endif

    <form method="POST" action="{{ route('text.translate') }}">
        @csrf
        <label for="textMessage">Mensaje en Texto:</label>
        <input type="text" id="textMessage" name="textMessage" required>
        <button type="submit">Codificar</button>
    </form>

    @if(isset($encodedMessage))
        <h2>Mensaje Codificado:</h2>
        <p>{{ $encodedMessage }}</p>
    @endif

<a href="{{ url('/') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"> Regresar a la pagina anterior</a>

</body>
</html>