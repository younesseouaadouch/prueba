<!-- Codifica un programita en PHP que haga un listado de la BBDD olimpiadas, tabla deportes, utilizando el interfaz OO

->Conectarte creando un objeto MySQLi
->Comprobar que la conexiÃ³n estÃ¡ establecida
->Poner el charset para la comunicaciÃ³n
->Listar los deportes
->Liberar el objeto recurso
->Cerrar la conexiÃ³n

Es decir, lo mismo que en el ejemplo pero OO
----------------------------------------------------------
Mete en la query una variable como en el ejemplo de ataque y protÃ©gete de ataques de inyecciÃ³n SQL. Lista las medallas de determinada modalidad

Usa mysqli_real_escape_string()
----------------------------------------------------------
Modifica el anterior con el siguiente planteamiento:
Hazte una query usando prepare y envÃ­ale por separado los parÃ¡metros con mysqli_stmt::bind_param()
 -->
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
  <body>
<?php
define("SERVIDOR","localhost");
define("BBDD","olimpiadas");
define("USUARIO","root");
define("CLAVE","");

$con = mysqli_connect(SERVIDOR,BBDD,USUARIO,CLAVE);
if(!$conexion){
  print "<p>Algo va mal</p>\n";
  print "<p>".mysqli_connect_error()."</p>\n";
  die("Abotamos la mision");
}

mysqli_set_charset($conexion, 'utf8');
$sql = "SELECT * FROM `deportes`  \n"
    . "ORDER BY `deportes`.`codigo` ASC;";

?>
 </body>
</html>