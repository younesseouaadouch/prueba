<html lang="en">
<head>
    <?php
     ini_set('display_errors','On');
    error_reporting(E_ALL);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$inicio = 1900;
$fin = date("Y");
$contador = 0;

for ($anio = $inicio; $anio <= $fin; $anio++) {
    $fecha = "$anio-10-01"; // 1 de octubre de cada año
    $diaSemana = date("N", strtotime($fecha)); // 6 = sábado (N: 1=lun ... 7=dom)

    if ($diaSemana == 6) {
        $contador++;
        print "<p>$año</p>.<br>";
    }
}
    ?>
</body>
</html>