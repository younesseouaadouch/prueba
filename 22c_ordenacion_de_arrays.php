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
     require_once 'datos/alumnos.php';
     require_once 'datos/capitales.php';    
     // print "<pre>".print_r($capital,true)."</pre>\n";
     // sort($capital);
     // print "<pre>".print_r($capital,true)."</pre>\n";
    // rsort($capital);
    // print "<pre>".print_r($capital,true)."</pre>\n"; 
    // asort($capital);
    // print "<pre>".print_r($capital,true)."</pre>\n";
    // arsort($capital);
    // print "<pre>".print_r($capital,true)."</pre>\n";
    // ksort($capital);
    // print "<pre>".print_r($capital,true)."</pre>\n";
    // krsort($capital);
    // print "<pre>".print_r($capital,true)."</pre>\n";
    
    /*
    Trasteamos un poco con funciones de ordenación/comparación de cadenas strcmp
    */
    
    $cadena1="A";
    $cadena2="Z";
    print "<p>strcmp(\"$cadena1\",\"$cadena2\"): ".strcmp($cadena1,$cadena2)."</p>";
    
     $cadena1="A";
    $cadena2="B";
    print "<p>strcmp(\"$cadena1\",\"$cadena2\"): ".strcmp($cadena1,$cadena2)."</p>";
    
     $cadena1="C";
    $cadena2="A";
    print "<p>strcmp(\"$cadena1\",\"$cadena2\"): ".strcmp($cadena1,$cadena2)."</p>";
    
     $cadena1="F";
    $cadena2="E";
    print "<p>strcmp(\"$cadena1\",\"$cadena2\"): ".strcmp($cadena1,$cadena2)."</p>";

     $cadena1="A";
    $cadena2="Z";
    print "<p>strcmp(\"$cadena1\",\"$cadena2\"): ".strcmp($cadena1,$cadena2)."</p>";
    
     $cadena1="A";
    $cadena2="Z";
    print "<p>strcmp(\"$cadena1\",\"$cadena2\"): ".strcmp($cadena1,$cadena2)."</p>";
    
     $cadena1="HOLA";
    $cadena2="HOLA";
    print "<p>strcmp(\"$cadena1\",\"$cadena2\"): ".strcmp($cadena1,$cadena2)."</p>";
 ?>
  </body>
</html>