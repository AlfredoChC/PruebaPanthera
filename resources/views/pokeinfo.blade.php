<!DOCTYPE html>
<head>
</head>
<body>
<?php
$Data= $_REQUEST['ID'];
$ch= curl_init();
curl_setopt($ch, CURLOPT_URL,"https://pokeapi.co/api/v2/pokemon/$Data/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$PokeData = curl_exec($ch);
curl_close($ch);
$Valor = json_decode($PokeData, TRUE);
echo '<h1> Nombre del Pokemon: ' .$Valor['name']. '</h1>'; 
echo" <img src=https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/$Data.png>" ;
echo" <img src=https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/back/$Data.png>";
#obtener habilidades
$ch= curl_init();
curl_setopt($ch, CURLOPT_URL,"https://pokeapi.co/api/v2/ability/$Data/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$PokeData = curl_exec($ch);
curl_close($ch);
$Valor1 = json_decode($PokeData, TRUE);
echo "<h3> Habilidad: <h3>";
echo '<h3> ' .$Valor1['name']. ' </h3>'; 

?>
<a href="{{ url('/') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Ver todos los pokemon</a>

</body>

</html>