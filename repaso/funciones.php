<?php
require_once '../datos/deuda_codigos.php';
function tabla_total(){
    global $comunidad;
    print "<fieldset>";
    foreach($comunidad as $dato){
print "<a href=\"#\"".implode("</a><a href=\"#\"",$dato)."</a>";
    }
    print "</fieldset>";
}
?>