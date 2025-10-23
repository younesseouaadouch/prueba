<?php
/* <!-- 
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
 --> */
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
        
        $paises = array_keys($capital);
        $capitales = array_values($capital);

        
        ?>