
<?php
ini_set('display_errors','On');
error_reporting(E_ALL);
require_once 'funciones.php';

// Se supone que me llega un parámetro alumno en el POST

formulario_edicion($_GET['alumno']);
?>