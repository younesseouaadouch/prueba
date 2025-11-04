<!DOCTYPE html>
<html lang="es">
  <head>
    <?php
    ini_set('display_errors','On');
    error_reporting(E_ALL);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Has olvidado el título</title>
    <!--
    <link rel="stylesheet" href="style.css">
    -->
  </head>
  <body>
   <?php
    require_once "datos/provincias.php";
    print "<p>Recibido el dato $_GET[prov]</p>\n";
    print "<p>Corresponde a ".$provincia[$_GET['prov']]."</p>\n";
    print "<p>Corresponde a ${provincia[$_GET['prov']]}</p>\n";
    print "<p>Corresponde a {$provincia[$_GET['prov']]}</p>\n";
    
    ?>
  </body>
</html>