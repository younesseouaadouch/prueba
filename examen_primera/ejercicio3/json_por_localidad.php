<?php
require_once "funciones.php";
header('Content-Type: application/json');
JSON_filtrar_poblacion($_GET['poblacion']);
/*
Pruebas con el json_encode
*/
// print "<pre>".print_r($empresa[0],true)."</pre>";

// print json_encode($empresa, JSON_PRETTY_PRINT);
// print json_last_error();
?>