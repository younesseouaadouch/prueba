<!DOCTYPE html>
<html lang="es">
  <head>
    <?php
    ini_set('display_errors','On');
    error_reporting(E_ALL);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array reduce</title>
    <!--
    <link rel="stylesheet" href="style.css">
    -->
  </head>
  <body>
    <?php
    require_once 'datos/provincias_densidad.php';
    $dato=range(10,100,5);
    print "<pre>".print_r($dato,true)."</pre>\n";   
    
    $resultado=array_reduce($dato,function($acumulado,$elemento){
        return $acumulado.", $elemento";
    });
    
    /* Reescribimos y le ponemos valor inicial cero*/
    
   /*  $resultado=array_reduce($dato,
                            function($acumulado,$elemento){
                                        return $acumulado.", $elemento";
                                    },
                            0);
    
    print $resultado; */
    
/*
Lista con los elementos del array
*/  
print "\n\n<ol>".array_reduce($dato,function($acumulado,$e){return $acumulado."\n\t<li>$e</li>";})."\n</ol>\n";

$misma_lista="<ol>";
foreach($dato as $d){
    $misma_lista.="<li>$d</li>";
}   
$misma_lista.="</ol>\n";
print $misma_lista;

/*
Ejemplo: Suma de los 100 primeros números
*/ 
function suma_de_dos($x,$y){
    return $x+$y; 
}

print "<p>Suma: ".array_reduce(range(1,100),'suma_de_dos',0)."</p>\n";
/*
Internamente está haciendo algo así

suma_de_dos(suma_de_dos(suma_de_dos(0,1),2),3)
*/
$suma=0;

foreach(range(1,100) as $n){
    $suma=suma_de_dos($suma,$n);
}

print "<p>Suma: $suma</p>";
/*
Los acumulados no son solamente números o cadenas.

Intenta lo siguiente:

Partiendo del valor inicial_

array(
    'hombres'=> 0,
    'mujeres'=> 0,
    'superficie'=> 0
  );
  
y usando los datos de provincias_densidad.php, haz un reduce para calcular el total de hombres, mujeres y Kilómetros cuadrados de todas las provincias.
En el mismo array, mete el total de habitantes y la densidad del conjunto.
*/
function calcular_totales($acumulador, $item) {
    // 1. Acumular el total de hombres
    $acumulador['hombres_total'] += $item['hombres'];
    
    // 2. Acumular el total de mujeres
    $acumulador['mujeres_total'] += $item['mujeres'];
    
    // 3. Acumular la superficie total en km²
    $acumulador['superficie_total_km2'] += $item['superficie'];
    
    return $acumulador;
}

// 1. Define el valor inicial del acumulador (reduce).
// Se inicializa con ceros para las claves que queremos sumar.
$inicial = [
    'hombres_total' => 0,
    'mujeres_total' => 0,
    'superficie_total_km2' => 0,
];

// 2. Ejecuta el array_reduce para calcular los totales de hombres, mujeres y superficie.
// $prov es el array de entrada que obtuvimos de provincias_densidad.php
$totales = array_reduce($prov, 'calcular_totales', $inicial);

// 3. Calcula el total de habitantes del conjunto.
$totales['habitantes_total'] = $totales['hombres_total'] + $totales['mujeres_total'];

// 4. Calcula la densidad del conjunto.
// Fórmula: Total de Habitantes / Superficie Total (km²)
// Usamos round() para limitar los decimales a 2 para mayor claridad.
// Evitamos división por cero por si la superficie fuera 0 (aunque aquí no aplica)
if ($totales['superficie_total_km2'] > 0) {
    $totales['densidad_conjunto_hab_km2'] = round(
        $totales['habitantes_total'] / $totales['superficie_total_km2'], 
        2
    );
} else {
    $totales['densidad_conjunto_hab_km2'] = 0;
}

// Muestra el resultado final.
echo "<h2>✅ Resultados del Cálculo con array_reduce</h2>";
echo "<p>Se ha utilizado <code>array_reduce()</code> para consolidar los datos de todas las provincias.</p>";
echo "<pre>";
print_r($totales);
echo "</pre>";
    ?>
  </body>
</html>