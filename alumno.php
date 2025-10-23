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
    // Buscar: (.*):(.*):(.*):(.*)
// Reempl: $cuentas[]='\1';
$cuentas[]='dw2t_yaime_ramil';
$cuentas[]='dw2t_eder';
$cuentas[]='dw2t_isai';
$cuentas[]='dw2t_ikerc';
$cuentas[]='dw2t_ikere';
$cuentas[]='dw2t_jon_ander';
$cuentas[]='dw2t_gonzalo';
$cuentas[]='dw2t_jon_ismael';
$cuentas[]='dw2t_maria_concepcion';
$cuentas[]='dw2t_asier';
$cuentas[]='dw2t_alexis_josue';
$cuentas[]='dw2t_younessek';
$cuentas[]='dw2t_aingeru';
$cuentas[]='dw2t_ander';
$cuentas[]='dw2t_endika';
$cuentas[]='dw2t_ndika';
$cuentas[]='dw2t_davido';
$cuentas[]='dw2t_younesseo';
$cuentas[]='dw2t_eneko';
$cuentas[]='dw2t_cesar_alexis';
$cuentas[]='dw2t_francisco';
$cuentas[]='dw2t_levan';
$cuentas[]='dw2t_alain';
$cuentas[]='dw2t_davids';
$cuentas[]='dw2t_ager';

$alumnos=array(
    'Yaime Ramil Camacho Leon',
    'Isai Coronel Ale',
    'Iker Cortes Terre',
    'Iker Encinas Arnaiz',
    'Jon Ander Fernandez Dos Santos',
    'Gonzalo Fernandez Ripa',
    'Jon Ismael Garcia Belso',
    'Maria Concepcion Gimenez Peralta',
    'Asier Guaman Lopez',
    'Alexis Josue Guaño Santos',
    'Younesse Khatibi ',
    'Aingeru Lazaro Rodriguez',
    'Ander López de Vallejo Hidalgo',
    'Endika Mateos Bezana',
    'Ndika Jagoba Ordiano Iglesias',
    'David Orueta Lavandero',
    'Younesse Ouaadouch ',
    'Eneko Plaza Vallejo',
    'Cesar Alexis Quispe Montano',
    'Francisco Ruiz Rodríguez',
    'Levan Sabashvili ',
    'Alain Sánchez López',
    'David Sánchez Varona',
    'Ager Zabala Ceballos'
);

/* print "<table>";
print "<tr><th>Usuario</th><th>Cuenta</th></tr>";
for($i=0; $i < count($alumnos);$i++){
print "<tr><td>$alumnos[$i]</td><td>$cuentas[$i]</td></tr>";
}
print "</table>"; */
print "<ol>";
for($i=0; $i < count($alumnos);$i++){
print "<li><a href=\"http://10.0.56.66/~$alumnos[$i]/\">$alumnos[$i]<a></li>";
}
print "</ol>"
 ?>
 </body>
</html>