<!-- 
 Se pide generar dos ficheros:
 El primero se llamará 24_paises_y_capitales.php y el segunda 24_comprobar_capital.php
Cuando acabes los subes a tu carpeta del servidor.

Queremos animar a unos niños a que se aprendan las capitales de Europa. Para ello disponemos de un array 
asociativo con paises y capitales. Creamos un pequeño formulario que hará lo siguiente:

Elegimos al azar un pais y le presentamos el nombre y un desplegable con todas las capitales.

PISTA: Busca en la referencia las funciones array_keys y array_values para poder obtener dos arrays de claves
 numéricas a partir del array asociativo. 
PISTA: Para generar un número aleatorio puedes usar la función rand

El formulario envía los datos de la siguiente manera: 
Hay un campo input oculto llamado pais que contiene el número del país que ha salido: 0 si es Albania, 
1 si es Alemania...
La lista desplegable envía el número de la opción elegida: 0 si es Tirana, 1 Berlin...


En el documento que recibe los datos pueden aparecer dos cosas. 
Si la respuesta es correcta se escribe: "Muy bien, la capital de ... es ..."
Si es incorrecta se escribe "Lo siento, has fallado. La capital de ... es ... " y se muestra la tabla de capitales.

VERSIÓN MEJORADA:
En caso de fallo debe decir: Lo siento, la capital de Alemania no es Londres sino Berlín. Londres es la capital de Reino Unido

HAZ UNA SEGUNDA VERSIÓN QUE EN VEZ DE CÓDIGOS MANDE CADENAS

PISTA: El array está en los dos ficheros. Si te resulta complicado escribir los mensajes de acierto o error,
 empieza por poner "has acertado" y "has fallado" y déjalo para el final, pero no dejes la tabla sin hacer. Haz la tabla en una función
 
        $capital=array(
        'Albania' => 'Tirana',
        'Alemania' => 'Berlin',
        'Andorra' => 'Andorra la Vella',
        'Armenia' => 'Erevan',
        'Austria' => 'Viena',
        'Azerbaiyan' => 'Baku',
        'Belgica' => 'Bruselas',
        'Bielorrusia' => 'Minsk',
        'Bosnia-Herzegovina' => 'Sarajevo',
        'Bulgaria' => 'Sofia',
        'Chipre' => 'Nicosia',
        'Croacia' => 'Zagreb',
        'Dinamarca' => 'Copenhague',
        'Eslovaquia' => 'Bratislava',
        'Eslovenia' => 'Liubliana',
        'España' => 'Madrid',
        'Estonia' => 'Tallin',
        'Finlandia' => 'Helsinki',
        'Francia' => 'Paris',
        'Georgia' => 'Tiflis',
        'Grecia' => 'Atenas',
        'Holanda' => 'Amsterdam',
        'Hungría' => 'Budapest',
        'Irlanda (Eire)' => 'Dublin',
        'Islandia' => 'Reykjavik',
        'Italia' => 'Roma',
        'Kazajstan' => 'Almaty',
        'Kirguizistan' => 'Bishkek',
        'Letonia' => 'Riga',
        'Liechtenstein' => 'Vaduz',
        'Lituania' => 'Vilna',
        'Luxemburgo' => 'Luxemburgo',
        'Macedonia' => 'Skopje',
        'Malta' => 'La Valletta',
        'Moldova' => 'Chisinau',
        'Mónaco' => 'Monaco',
        'Montenegro' => 'Podgorica',
        'Noruega' => 'Oslo',
        'Polonia' => 'Varsovia',
        'Portugal' => 'Lisboa',
        'Reino Unido' => 'Londres',
        'República Checa' => 'Praga',
        'Rumania' => 'Bucarest',
        'Rusia' => 'Moscu',
        'San Marino' => 'San Marino',
        'Santa Sede' => 'Vaticano',
        'Serbia' => 'Belgrado',
        'Suecia' => 'Estocolmo',
        'Suiza' => 'Berna',
        'Tayikistan' => 'Dushanbe',
        'Turkmenistan' => 'Ashgabat',
        'Ucrania' => 'Kiev',
        'Uzbekistan' => 'Tashkent'
        );
        
 
-->
<!DOCTYPE html>
<html lang="es">
  <head>
        <meta charset="UTF-8">
    <title>Países y capitales</title>
  </head>
  <body>
    <?php
    $sorteo = rand(0,count($capital)-1);
    print "<p>ha salido $sorteo</p>\n";
    $paises=array_keys($capital);
    print "<p>Pais $"
    ?>
  <p>Enunciado en el código fuente como comentario</p>
<p>Pais 8, corresponde a Bosnia-Herzegovina</p>
<form action="24_comprobar_capital.php" method="GET">
<input type="hidden" name="pais" value="8">
<p>¿Cuál es la capital de Bosnia-Herzegovina?</p>
<select name="capital" id="capital">
<option value="-1">--CAPITAL---</option>
<option value="26">Almaty</option>
<option value="21">Amsterdam</option>
<option value="2">Andorra la Vella</option>
<option value="50">Ashgabat</option>
<option value="20">Atenas</option>
<option value="5">Baku</option>
<option value="46">Belgrado</option>
<option value="1">Berlin</option>
<option value="48">Berna</option>
<option value="27">Bishkek</option>
<option value="13">Bratislava</option>
<option value="6">Bruselas</option>
<option value="42">Bucarest</option>
<option value="22">Budapest</option>
<option value="34">Chisinau</option>
<option value="12">Copenhague</option>
<option value="23">Dublin</option>
<option value="49">Dushanbe</option>
<option value="3">Erevan</option>
<option value="47">Estocolmo</option>
<option value="17">Helsinki</option>
<option value="51">Kiev</option>
<option value="33">La Valletta</option>
<option value="39">Lisboa</option>
<option value="14">Liubliana</option>
<option value="40">Londres</option>
<option value="31">Luxemburgo</option>
<option value="15">Madrid</option>
<option value="7">Minsk</option>
<option value="35">Monaco</option>
<option value="43">Moscu</option>
<option value="10">Nicosia</option>
<option value="37">Oslo</option>
<option value="18">Paris</option>
<option value="36">Podgorica</option>
<option value="41">Praga</option>
<option value="24">Reykjavik</option>
<option value="28">Riga</option>
<option value="25">Roma</option>
<option value="44">San Marino</option>
<option value="8">Sarajevo</option>
<option value="32">Skopje</option>
<option value="9">Sofia</option>
<option value="16">Tallin</option>
<option value="52">Tashkent</option>
<option value="19">Tiflis</option>
<option value="0">Tirana</option>
<option value="29">Vaduz</option>
<option value="38">Varsovia</option>
<option value="45">Vaticano</option>
<option value="4">Viena</option>
<option value="30">Vilna</option>
<option value="11">Zagreb</option>
</select>
<input type="submit" value="Comprobar Capital">
</form>
<script>
let element = document.getElementById('capital');
    element.value = -1;
</script>
  </body>
</html>
