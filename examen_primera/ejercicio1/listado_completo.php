<!DOCTYPE html>
<html lang="es">
  <head>
    <?php
    ini_set('display_errors','On');
    error_reporting(E_ALL);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Completo</title>
    <!--
    <link rel="stylesheet" href="style.css">
    -->
  </head>
  <body>
    <?php
    require_once 'funciones.php';
    //POdríamos ponerlo en castellano setlocale()
    usort($empresa,'orden_empresas');
    tabla_de_empresas($empresa);
    ?>
  </body>
</html>