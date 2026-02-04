<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<?php
ini_set('display_errors','On');
error_reporting(E_ALL);
/*
Si existe dato en $_GET['usuario'] y no está formado por "whitespaces"
*/
if(isset($_GET['usuario'])&&!preg_match('/^\s*$/',$_GET['usuario'])){
    setcookie('usuario',$_GET['usuario'],strtotime('+ 1 month'));
}
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<title>Recordando un usuario</title>
</head>
<body>
<?php
/*
Aquí podemos dar un mensaje de confirmacioón
*/
if(isset($_GET['usuario'])){
    print "<p>Bienvenido a <q><em>la familia</em></q> $_GET[usuario]</p>\n";
}
?>
</body>
</html>