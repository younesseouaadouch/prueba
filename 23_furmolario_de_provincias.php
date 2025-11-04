<!DOCTYPE html>
<!--
Guarda los datos de provincias.php y los incluyes en tu programa 23_formulario_de_provincias.php como fichero externo.
Genera un formulario a partir del array con todas las provincias con su código correspondiente en un drop-down list (desplegable).
Deben aparecer las provincias ordenadas alfabéticamente.
Recoge el dato en otro fichero 23_recoger_provincia.php que diga "Has elegido la provincia 40 que es Segovia" 

Puedes comprobar que el dato sea correcto con array_key_exists() y en caso de que no lo sea usar die() para terminar
-->
<html lang="es">
  <head>
	    <meta charset="UTF-8">
    <title>Formulario de provincias</title>
  </head>
  <body>
    <?php
require_once "datos/provincias.php";
setlocale(LC_ALL,'spanish_Spain.utf8','es_ES.utf8');
asort($provincia,SORT_LOCALE_STRING);
// print "<pre>".print_r($provincia,true)."</pre>\n";
print <<<FORM1
<form action="23_recibir_provincia.php" method="GET">
<select name="prov">
<option value="0" selected>-- seleccionar provincia --</option>

FORM1;
foreach($provincia as $codigo => $nombre){
    print "\t<option value=\"$codigo\">$nombre</option>\n";
}
print <<<FORM2
</select>
<input type="submit">
</form>
FORM2;
?>
 <!--  <p>Enunciado en el código fuente como comentario</p>
<form action="23_recoger_provincia.php" method="GET">
Seleccionar Provincia:
<select name="provincia">
<option value="0" selected>-- seleccionar provincia --</option>
<option value="2">Albacete</option>
<option value="3">Alicante/Alacant</option>
<option value="4">Almería</option>
<option value="1">Araba/Álava</option>
<option value="33">Asturias</option>
<option value="5">Ávila</option>
<option value="6">Badajoz</option>
<option value="7">Balears, Illes</option>
<option value="8">Barcelona</option>
<option value="48">Bizkaia</option>
<option value="9">Burgos</option>
<option value="10">Cáceres</option>
<option value="11">Cádiz</option>
<option value="39">Cantabria</option>
<option value="12">Castellón/Castelló</option>
<option value="51">Ceuta</option>
<option value="13">Ciudad Real</option>
<option value="14">Córdoba</option>
<option value="15">Coruña, A</option>
<option value="16">Cuenca</option>
<option value="20">Gipuzkoa</option>
<option value="17">Girona</option>
<option value="18">Granada</option>
<option value="19">Guadalajara</option>
<option value="21">Huelva</option>
<option value="22">Huesca</option>
<option value="23">Jaén</option>
<option value="24">León</option>
<option value="25">Lleida</option>
<option value="27">Lugo</option>
<option value="28">Madrid</option>
<option value="29">Málaga</option>
<option value="52">Melilla</option>
<option value="30">Murcia</option>
<option value="31">Navarra</option>
<option value="32">Ourense</option>
<option value="34">Palencia</option>
<option value="35">Palmas, Las</option>
<option value="36">Pontevedra</option>
<option value="26">Rioja, La</option>
<option value="37">Salamanca</option>
<option value="38">Santa Cruz de Tenerife</option>
<option value="40">Segovia</option>
<option value="41">Sevilla</option>
<option value="42">Soria</option>
<option value="43">Tarragona</option>
<option value="44">Teruel</option>
<option value="45">Toledo</option>
<option value="46">Valencia/València</option>
<option value="47">Valladolid</option>
<option value="49">Zamora</option>
<option value="50">Zaragoza</option>
</select>
<input type="submit" value="Enviar Provincia">
</form> -->  </body>
</html>