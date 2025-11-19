<?php
require_once '../datos/deuda_codigos.php';
function tabla_autonomia(){
    global $comunidad;
    print "<fieldset>";

    $cont = 0;
 foreach($comunidad as $dato){
        echo "<a href=\"#\" style=\"margin-right:10px;\">$dato</a>";
        $cont++;

        if($cont % 9 == 0){
          print "<br>";
        }
    }
    print "</fieldset>";
}

function tabla_provincia(){
    global $comunidad;
    global $provincia;

    if (isset($_GET['comunidad'])) {
    $idComunidad = (int)$_GET['comunidad'];

    if (isset($provincia[$idComunidad])) {
        echo "<h3>Provincias de " . htmlspecialchars($comunidad[$idComunidad]) . "</h3>";
        $contador = 0;

        foreach ($provincia[$idComunidad] as $prov) {
            echo "<a href=\"#\">$prov</a> ";
        }

    }
}
}
?>