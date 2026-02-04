<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<!--
Escribe un documento que, si tiene definida una cookie 'usuario' muestra por pantalla 'hola pepito'
En caso de que no lo tenga definido, muestra un formulario en el que pie el nombre de usuario y llama a 01_procesar_login, que es el que define la cookie.
Investiga cómo podrías añadir un botón en el caso de que la cookie esté definida para que la borre
-->
<html>
<head>
<?php
ini_set('display_errors','On');
error_reporting(E_ALL);
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<title>Saludo o Login</title>
</head>
<body>
<div id="control">
<?php
if(isset($_COOKIE['usuario'])){
    print "<p>Hola $_COOKIE[usuario]</p>\n";
    print "<a href=\"olvidar_usuario.php\"><button>Olvídame</button></a>";
}else{
        print <<<FORMULARIO
        <form action="recordar_usuario.php" method="GET">
        ¿Cómo te llamas?
        <input type="text" name="usuario" autocomplete="off">
        <input type="submit" value="RECORDARME">
        <form>
FORMULARIO;
}
?>
</div>
</body>
</html>