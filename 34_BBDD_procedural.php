<!DOCTYPE html>
<html lang="es">
  <head>
	    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso a BBDD desde PHP. Procedural</title>
	<!--
    <link rel="stylesheet" href="style.css">
	-->
  </head>
 <!--
Cuando queremos usar alguna de las extensiones de PHP para
 BBDD la primera opción a tomar es si nuestro programa 
 servirá sólo para un SGDB (por ejemplo, ORACLE) o bien 
 trabajamos con una "extensión abstracta".


Lo segundo quiere decir que usamos funciones genéricas
 comunmente asociadas a un objeto. En el constructor 
 decimos cuál es el SGDB que usamos.
VENTAJA:Podemos trabajar con cualquier SGBD sin conocer su
 propio interfaz. Esto facilita migraciones a otro SGBD y
 también cambios de personal.
DESVENTAJA: El añadir una capa más resta eficiencia a la 
herramienta.

La otra alternativa es usar un interfaz propio para cada SGBD
Nosotros usaremos MySQLi donde i viene de improved, mejorado
--> 
 <body>
<?php
define('SERVIDOR','localhost');
define('BBDD','olimpiadas');
define('USUARIO','root');
define('CLAVE','');
 $conexion=mysqli_connect(SERVIDOR,USUARIO,CLAVE,BBDD);

if(!$conexion){
  print "<p>Algo va mal</p>\n";
  print "<p>".mysqli_connect_error()."</p>\n";
  die("Abotamos la mision");
}
mysqli_set_charset($conexion, 'utf8');
$sql = "SELECT * FROM `deportes`  \n"
    . "ORDER BY `deportes`.`codigo` ASC;";
   $resu=mysqli_query($conexion,$sql) or die("<p>Error ".mysqli_errno($conexion).":".mysqli_error($conexion)."</p>");
   print "<p>Query realizada</p>\n";
   print "<p>tenemos ".mysqli_num_rows($resu)."registros</p>\n";
   $dato = mysqli_fetch_row($resu);
   print "<pre>".print_r($dato,true)."</pre>";

    $dato = mysqli_fetch_assoc($resu);
   print "<pre>".print_r($dato,true)."</pre>";

    $dato = mysqli_fetch_array($resu);
   print "<pre>".print_r($dato,true)."</pre>";

   mysqli_data_seek($resu, 0);
   $dato=mysqli_fetch_assoc($resu);

   print "<pre>".print_r($dato,true)."</pre>\n";

   mysqli_data_seek($resu, 9);
   $dato=mysqli_fetch_assoc($resu);
   print "<pre>Registro numero 10<\pre>\n";
   print "<pre>".print_r($dato,true)."</pre>\n";

   mysqli_data_seek($resu, 0);
   print "<ol>\n";
while($fila=mysqli_fetch_row($resu)){
       print "<li>$fila[1] ($fila[0])</li>\n";
}
    print "</ol>\n";

    mysqli_data_seek($resu, 0);
   print "<ol>\n";
while($fila=mysqli_fetch_assoc($resu)){
       print "<li>$fila[nombre] ($fila[codigo])</li>\n";
}
    print "</ol>\n";

    mysqli_data_seek($resu,0);

    $todo=mysqli_fetch_all($resu,MYSQLI_ASSOC);
      print "<pre>".print_r($todo,true)."</pre>";

      /* print "<pre>".json_encode($todo,json_pretty_print|json_unescaped_unicode)."</pre>\n"; */

?>

	  </body>
</html>