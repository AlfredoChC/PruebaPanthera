<!DOCTYPE html>
<head>
    <h1 text-align="center"> Bienvenido a la Pokedex </h1>
    <h2> Pokemon mostrados por la API: </h2>
</head>
<body>
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/user/profile') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Editar Perfil</a>
                    <br>
                    <a href="{{ url('/pokemones') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Ver Pokemon de la base de datos</a>

                @else
                <a href="{{ url('/pokemones') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Ver Pokemon de la base de datos</a>

                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
                    <br>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registrate aqui</a>
                    @endif
                @endauth
                <p>mira los otros ejercicios aqui:</p>
                <a href="{{ url('/morse') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Traductor de clave morse</a>
                <br>
                <a href="{{ url('/matriz') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Ejercicio de Matriz</a>
                <br>
            </div>
        @endif
    <form action="/info" method="POST">  
        @csrf
<?php
for ($i= 1 ; $i <= 151; $i++) {
echo' <button type="submit" class="btn btn-primary" name="ID" value='.$i.'> <img src=https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/'.$i.'.png> </button>';
}
?>
    </form>
</body>
</html>