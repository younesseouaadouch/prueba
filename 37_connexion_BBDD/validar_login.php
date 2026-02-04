
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
    <title>Metiendo un nuevo usuario</title>

  </head>
  <body>
    <?php
    print "<pre>".print_r($_POST,true)."</pre>\n";
    validar_login($_POST);
    ?>
  </body>
</html>
