<!DOCTYPE html>
<!--
Utilizando el código del ejercicio 14 se pide:
Define una función calendario_mes($mes,$anho) que escriba la tabla calendario correspondiente a un mes.
Si no se le pasa un anho intenta que tome el año actual.
Estaría bien que se pudiese usar la función de estas tres maneras:

calendario_mes(3,2015,true)........Marzo de 2015. Escribe el año en la cabecera.
En la cabecera de la tabla del mes pone MARZO 2015 o solamente MARZO
calendario_mes(3,2015)........Marzo de 2015
calendario_mes(8).............Agosto de este año
calendario_mes()..............Este mes de este año

Utiliza la función anterior para definir

calendario($anho).

De nuevo, si no se le pasa un parámetro tomará el actual.

Por último, define

calendario_curso($anho_inicio).

Si no se le pasa parámetro hará el curso actual.
-->
<html lang="es">
  <head>
    <?php
    ini_set('display_errors','On');
    error_reporting(E_ALL&~E_DEPRECATED);
    ?>
    <meta charset="UTF-8">
    <title>Calendario mediante funciones</title>
  </head>
  <body>
<?php
function calendario_mes($mes,$anho){
    $fecha=mktime(0,0,0,$mes,1,$anho);/* mktime devuelve false si falla*/
    
    if(!$fecha){
        print "<p>calendario_mes: fecha incorrecta</p>\n";
        return false;
    }

    $ultimo=date('t',$fecha);

    $dia_semana_inicio=date('w',$fecha);

    $huecos=($dia_semana_inicio-1 +7)%7;

    $dia=(1-$huecos);

    // print "<p>El mes $mes del año $anho tiene $ultimo dias y empieza el día de la semana $dia_semana_inicio. Hay $huecos huecos</p>\n";

    print "<table class=\"mes\">\n";
    /* Inicio de cabecera */
    print "\t<thead>\n";
    print "\t\t<tr>\n";
    print "\t\t\t<th colspan=\"7\"> ";
    print strftime("%B",$fecha);
    print " $anho</th>\n";
    print "\t\t</tr>\n";
    print "\t\t<tr>\n";
    /*
    Usando ocmo separador un guión, podemos usar la fecha en dia-mes-año
    */
    $un_lunes=strtotime("31-10-2022");
    for($i=0;$i<7;$i++){
        print "\t\t\t<th>".strftime('%a',$un_lunes+$i*24*60*60)."</th>\n";
    }
    print "\t\t</tr>\n";
    print "\t</thead>\n";

    /* Fin de cabecera */
    while($dia <= $ultimo){//Mientran me queden dias
        print "\t\t\t<tr>\n";
        for($i=0;$i<7;$i++){//Escribo una semana
            print "\t\t\t\t<td>";
            print (($dia>0)&&($dia<=$ultimo))?$dia:"";
            print "</td>\n";
            $dia++;
        }
        print "\t\t\t</tr>\n";
    }
    print "\t<tbody>\n";
    print "\t</tbody>\n";
    print "</table>\n";
}
    

?>  
  </body>
</html>