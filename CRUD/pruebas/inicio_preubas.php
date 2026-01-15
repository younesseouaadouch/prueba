<!DOCTYPE html>
<html lang="es">
  <head>
    <?php
    ini_set('display_errors','On');
    error_reporting(E_ALL);
    require_once 'funciones.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Has olvidado el título</title>
    <script src="pruebas.js"></script>
    <!--
    <link rel="stylesheet" href="style.css">
    -->
  </head>
  <body>
    <div id="controles">
    <?php
        print "<fieldset>\n";
        print "<legend>Selecciona ciclo y nivel</legend>\n";
        desplegable_ciclos();
        controles_nivel(-1);
        print "</fieldset>\n";

    ?>
    </div>
<div id="listado">
</div>
<dialog id="mostrar">
<div class="datos"></div>
    <div class="acciones">
        <button class="cerrar">OK</button>
    </div>
</dialog>
<dialog id="editar"></dialog>
</body>
</html>