<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<?php
ini_set('display_errors','On');
error_reporting(E_ALL);
$usuario=$_COOKIE['usuario'];
unset($_COOKIE['usuario']);
setcookie('usuario','',strtotime('-1 month'));
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<title>Olvidando el usuario</title>
</head>
<body>
<?php
print "<p>Hasta nunca $usuario</p>\n";
?>
</body>
</html>