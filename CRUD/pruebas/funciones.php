
<?php
    define('SERVIDOR','localhost');
    define('BBDD','instituto');
    define('USUARIO','juanjo');
    define('CLAVE','12345');

function desplegable_ciclos($por_defecto=-1){
    /*
    EJEMPLO SIN PARÁMETROS
    SELECT * FROM `ciclos` 
    */
    
    $mysqli = new mysqli(SERVIDOR, USUARIO, CLAVE, BBDD);

    $mysqli->set_charset('utf8');
    $sql="SELECT * FROM `ciclos`; ";
    $resultado = $mysqli->query($sql);
    print "<select name=\"ciclo\">\n";
    print "<option> -- seleccione un ciclo --  </option>\n ";
    while($fila = $resultado->fetch_assoc()){
        /*
        Si el ciclo es el que quiero que sea el valor por defecto, ponemos "selected"
        */
        $marcar=($fila['cod_ciclo']==$por_defecto)?"selected":"";
        print "<option value=\"$fila[cod_ciclo]\" $marcar>$fila[nombre]</option>\n";
    }
    print "</select>\n";
    
    $resultado->free();
    $mysqli->close();
    }
    
/*
Para el nivel no necesitamos hace una función: es simepre igual

print "<br><p>Nivel: ";
    print "<label>1 <input type=\"radio\" name=\"nivel\" value=\"1\" checked></label>\n";
    print "<label>2 <input type=\"radio\" name=\"nivel\" value=\"2\"></label></p>\n";
*/  

function listado_grupo($ciclo,$nivel){
    /*
    SELECT * FROM `alumnos` WHERE `ciclo` = 1 AND `nivel` = 2 
    */

    $mysqli = new mysqli(SERVIDOR, USUARIO, CLAVE, BBDD);

    $mysqli->set_charset('utf8');
    
    $sql="SELECT * FROM `alumnos` WHERE `ciclo` = ? AND `nivel` = ? ORDER BY `ape1` ASC, `ape2` ASC, `nombre` ASC;";
    $stmt = $mysqli->prepare($sql);
    if(!$stmt){print "prepare";}
    $stmt->bind_param("dd", $ciclo,$nivel);
    
    $stmt->execute();
    
    $stmt->store_result();
    
    $stmt->bind_result( 
    $cod_alumno,
    $nombre,
    $ape1,
    $ape2,
    $ciclo,
    $nivel,
    $repite,
    $nacimiento);
    
    print "<table class=\"listado\">\n";
    while($stmt->fetch()){
        print "<tr>\n";
        print "\t<td>$cod_alumno</td>\n";
//      print "\t<td>$nombre</td>\n";
//      print "\t<td>$ape1</td>\n";
//      print "\t<td>$ape2</td>\n";
        print "\t<td>$ape1 $ape2, $nombre</td>\n";
        print "\t<td><button>Editar</button></td>\n";
        print "\t<td><button>Borrar</button></td>\n";
        print "</tr>\n";
    }
    print "</table>\n";

}

function borrar_alumno($alumno){
    /*
     "DELETE FROM alumnos WHERE `alumnos`.`cod_alumno` = 105;"
    */
//  print "<p>Borrando</p>\n";
    $mysqli = new mysqli(SERVIDOR, USUARIO, CLAVE, BBDD);

    $mysqli->set_charset('utf8');
    
    $sql="DELETE FROM alumnos WHERE `alumnos`.`cod_alumno` = ?;";
    
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("d", $alumno);
    
    if(!$stmt->execute()){
        print "<p>ERROR al borrar</p>\n";
    }else{
        print "<p>Tarea realizada</p>\n";
        print "<p>Borradas ".$stmt->affected_rows." filas</p>\n";
    }
/*  
*/  
}

function formulario_edicion($alumno){
    /*
     SELECT * FROM `alumnos` WHERE `cod_alumno` = 15
     */
     
    $mysqli = new mysqli(SERVIDOR, USUARIO, CLAVE, BBDD);

    $mysqli->set_charset('utf8');

    $sql="SELECT * FROM `alumnos` WHERE `cod_alumno` = ?;";
    
    $stmt = $mysqli->prepare($sql);
    
    $stmt->bind_param("d", $alumno);
    
    $stmt->execute();
    
    $resultado = $stmt->get_result();
    
    $fila = $resultado->fetch_assoc();
    
//  print "<pre>".print_r($fila,true)."</pre>\n";
    print <<<FORMULARIO1
    <form method="POST" action="actualizar_alumno.php">
    <input type="hidden" name="cod_alumno" value=$fila[cod_alumno]>
    Nombre:<input type="text" name="nombre" value="$fila[nombre]"><br>
    Apellido1:<input type="text" name="ape1" value="$fila[ape1]"><br>
    Apellido2:<input type="text" name="ape2" value="$fila[ape2]"><br>
    Ciclo:
FORMULARIO1;
    desplegable_ciclos($fila['ciclo']);
    controles_nivel($fila['nivel']);
    control_repite($fila['repite']);
    print "<label>Fecha de nacimiento:<input type=\"date\" name=\"nacimiento\" value=\"$fila[nacimiento]\"></label><br>";
    print '<br>';
    print "<button type=\"submit\">Modificar</button>\n";
    print '</form>';
}

function controles_nivel($por_defecto){
    $defecto[1]="";
    $defecto[2]="";
    $defecto[$por_defecto]=" checked ";
    print <<<CONTROL
    <br>
    Nivel:
    <label>1 <input type="radio" name="nivel" value="1" $defecto[1]></label>
    <label>2 <input type="radio" name="nivel" value="2" $defecto[2]></label><br>
    
CONTROL;
}

function control_repite($valor){
    $marcado=($valor)?'checked':"";
    print "<label><input type=\"checkbox\" name=\"repite\" $marcado> Alumno repetidor </label><br>\n";
}

function modificar_alumno($dato){
/*
UPDATE `alumnos` SET `nombre` = 'Rafael...', `ape1` = 'Vercher...', 
`ape2` = 'Recasens...', `ciclo` = '2', `nivel` = '1', 
`repite` = '0', `nacimiento` = '2002-04-04' 
WHERE `alumnos`.`cod_alumno` = 1;
*/  
    $mysqli = new mysqli(SERVIDOR, USUARIO, CLAVE, BBDD);

    $mysqli->set_charset('utf8');


    $sql="UPDATE `alumnos` SET `nombre` = ?, `ape1` = ?, 
        `ape2` = ?, `ciclo` = ?, `nivel` = ?, 
        `nacimiento` = ? , `repite` = ?
    WHERE `alumnos`.`cod_alumno` = ?;";
    
    /*
    Quiero tratar de forma distinta el código y el campo "repite" 
    */
    $codigo=$dato['cod_alumno'];
    $repite=isset($dato['repite'])?"1":"0";
    // $dato['repite']=isset($dato['repite'])?"1":"0";
    
    unset($dato['cod_alumno']);
    unset($dato['repite']);
    
    $stmt = $mysqli->prepare($sql);
    
    // $stmt->bind_param("sssddsdd", ...$dato,$repite,$codigo);
    $stmt->bind_param("sssddsdd", $dato['nombre'],$dato['ape1'],$dato['ape2'],$dato['ciclo'],$dato['nivel'],$dato['nacimiento'],$repite,$codigo);
    
    if(!$stmt->execute()){
        print "<p>ERROR al actualizar</p>\n";
    }else{
        print "<p>Tarea realizada</p>\n";
        print "<p>Actualizados ".$stmt->affected_rows." registros</p>\n";
    }
}

function mostrar_alumno($alumno){
    /*
     SELECT * FROM `alumnos` WHERE `cod_alumno` = 15
     */

    $mysqli = new mysqli(SERVIDOR, USUARIO, CLAVE, BBDD);

    $mysqli->set_charset('utf8');

    $sql="SELECT * FROM `alumnos` WHERE `cod_alumno` = ?;";

    $stmt = $mysqli->prepare($sql);

    $stmt->bind_param("d", $alumno);

    $stmt->execute();

    $resultado = $stmt->get_result();

    $fila = $resultado->fetch_assoc();

    print "<pre>".print_r($fila,true)."</pre>\n";
}
?>
