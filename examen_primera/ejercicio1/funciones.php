<?php
require_once '../datos/quienesquien.php';
function tabla_de_empresas($dato){
    //$dato es un array de empresas
    print "<table>\n";
    //Tomo los nombres de campo de la primera empresas
    // $primera=array_first($dato);//Puede que no haya índice cero
    $primera=array_values($dato)[0];
    // print "<pre>".print_r($primera,true)."</pre>\n";
    $campos=array_keys($primera);
    // print "<pre>".print_r($campos,true)."</pre>\n";
    //Cabecera de tabla.
    print "<tr><th>".implode('</th><th>',$campos)."</th></tr>\n";
    foreach($dato as $d){
        $d['nombre']="<a href=\"$d[web]\">$d[nombre]</a>\n";
        print "<tr><td>".implode("</td><td>",$d)."</td></tr>\n";
    }
    print "</table>\n";
}
/*
ordenado por categoría y número de trabajadores. Si coincide el número de trabajadores ordena 
por localidad y luego por nombre de empresa. 
*/
function orden_empresas($a,$b){
    /*
    ESTO ESTÁ BIEN PERO ES CARO. MEJOR EL SIGUIENTE
    ASÍ NO LLAMAMOS A strcoll DOS VECES
    if(strcoll($a['categoria'],$b['categoria'])){
        //El if es cierto cuando es distinto de cero, 
        // es decir cuando las categorías son distintas
        //Ordenamos por categoría
        return strcoll($a['categoria'],$b['categoria']);
    }
    */
    if($ordenar=strcoll($a['categoria'],$b['categoria'])){
        //El if es cierto cuando es distinto de cero, 
        // es decir cuando las categorías son distintas
        //Ordenamos por categoría
        return $ordenar;
    }
    if($a['empleados']!=$b['empleados']){
        return $b['empleados']<=>$a['empleados'];
    }
    if($ordenar=strcoll($a['zona'],$b['zona'])){
        return $ordenar;
    }
    return strcoll($a['nombre'],$b['nombre']);
}
?>