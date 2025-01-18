<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>IoT Server</title>
</head>
<body style="background-color: black; font-family: Arial, sans-serif;">
<?php
function get_JSON_value ($sensor) {
    $uchwyt = fopen("http://husky.mruczek.org/IoTSensorServer/get_last_json.php?sensor=$sensor", "rb");
    $tresc = stream_get_contents($uchwyt);
    fclose($uchwyt);
    return json_decode($tresc, true);
}

$kody  = array ("s01" => "Temperatura",
    "s02b" => "Temperatura",
    "s02a" => "Ciśnienie atmosferyczne",
    "s03" => "Temperatura zewnętrzna",
    "s04t" => "Temperatura",
    "s04p" => "Ciśnienie atmosferyczne",
    "s04h" => "Wilgotność",
    "s04i" => "IAQ",
    // "s05" => "Temperatura zewnętrzna (battery)",
    // "s06" => "Temperatura zewnętrzna (battery)",
    // "s07t" => "Temperatura wewnętrzna MI",
    // "s07h" => "Wilgotość wewnętrzna MI",
    // "s07b" => "Stan baterii MI",
    "s08t" => "Temperatura zewnętrzna NRF Battery Sensor",
    "s08b" => "Stan baterii NRF Battery Sensor",
    // "s09t" => "Temperatura wewnętrzna NRF Battery Sensor",
    // "s09b" => "Stan baterii NRF Battery Sensor",
    // "s10t" => "Temperatura wewnętrzna NRF Battery Sensor",
    // "s10b" => "Stan baterii NRF Battery Sensor",
    // "s11w" => "Stan licznika wody"
    );
?>

<div style="text-align: center; margin: auto; width: 100%; color: lightgray;">
    <?php
    foreach ($kody as $code => $nazwa) {
        echo $nazwa.": ($code)";
        $j = get_JSON_value($code);
        $v = $j["Value"];
        $d = $j["Date"];
        echo " ".$v." @ ".$d;
        echo "<br/><img alt=\"wykres\" src=\"rrd_graph.php?$code;value;temp;end-48h\"/><br/>";
        echo "Last: <a href=\"rrd_graph.php?$code;value;temp;end-4h\">4h</a> ";
        echo "<a href=\"rrd_graph.php?$code;value;temp;end-750h\">750h</a> ";
        echo "<br/><br/>";
    }
    ?>

</div>



</body>
</html>
