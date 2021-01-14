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

$kody  = array ("s01" => "Temperatura", "s02b" => "Temperatura", "s02a" => "Ciśnienie atmosferyczne");
?>

<div style="text-align: center; margin: auto; width: 100%; color: lightgray;">
    <?php
    foreach ($kody as $code => $nazwa) {
        echo $nazwa." ($code)";
        $j = get_JSON_value($code);
        $v = $j["Value"];
        $d = $j["Date"];
        echo " ".$v." @ ".$d;
        echo "<br/><img alt=\"wykres\" src=\"rrd_graph.php?$code;value;temp;end-48h\"/><br/>";
    }
    ?>

    Temperatura (s01):
    Temperatura (s02b):
    Ciśnienie atmosferyczne (s02a):
    Temperatura zewnętrzna (s03):
    Temperatura (s04t):
    Ciśnienie atmosferyczne (s04p):
    Wilgotność (s04h):
    IAQ (s04i):
    Temperatura zewnętrzna (battery - s05):
    Temperatura zewnętrzna (battery - s06):
    Temperatura wewnętrzna MI (s07t):
    Wilgotość wewnętrzna MI (s07h):
    Stan baterii MI (s07b):
    Temperatura wewnętrzna NRF Battery Sensor (s08t):
    Stan baterii NRF Battery Sensor (s08b):
</div>



</body>
</html>
