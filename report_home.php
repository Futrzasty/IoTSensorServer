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
?>
?>
<div style="text-align: center; margin: auto; width: 100%; color: lightgray;">
    Temperatura (s01):
    <?php
    $j = get_JSON_value('s01');
    $v = $j["Value"];
    $d = $j["Date"];
    echo " ".$v." @ ".$d;
    ?>
    <br/>
    <img alt="wykres" src="rrd_graph.php?s01;value;temp;end-48h"/><br/>
    Temperatura (s02b):
    <?php
    $j = get_JSON_value('s02b');
    $v = $j["Value"];
    $d = $j["Date"];
    echo " ".$v." @ ".$d;
    ?>
    <br/>
    <img alt="wykres" src="rrd_graph.php?s02b;value;temp;end-48h"/><br/>
    Ciśnienie atmosferyczne (s02a):
    <?php
    $j = get_JSON_value('s02a');
    $v = $j["Value"];
    $d = $j["Date"];
    echo " ".$v." @ ".$d;
    ?>
    <br/>
    <img alt="wykres" src="rrd_graph.php?s02a;value;press;end-48h"/><br/>
    Temperatura zewnętrzna (s03):
    <?php
    $j = get_JSON_value('s03');
    $v = $j["Value"];
    $d = $j["Date"];
    echo " ".$v." @ ".$d;
    ?>
    <br/>
    <img alt="wykres" src="rrd_graph.php?s03;value;temp;end-48h"/><br/>
    Temperatura (s04t):
    <?php
    $j = get_JSON_value('s04t');
    $v = $j["Value"];
    $d = $j["Date"];
    echo " ".$v." @ ".$d;
    ?>
    <br/>
    <img alt="wykres" src="rrd_graph.php?s04t;value;temp;end-48h"/><br/>
    Ciśnienie atmosferyczne (s04p):
    <?php
    $j = get_JSON_value('s04p');
    $v = $j["Value"];
    $d = $j["Date"];
    echo " ".$v." @ ".$d;
    ?>
    <br/>
    <img alt="wykres" src="rrd_graph.php?s04p;value;press;end-48h"/><br/>
    Wilgotność (s04h):
    <?php
    $j = get_JSON_value('s04h');
    $v = $j["Value"];
    $d = $j["Date"];
    echo " ".$v." @ ".$d;
    ?>
    <br/>
    <img alt="wykres" src="rrd_graph.php?s04h;value;temp;end-48h"/><br/>
    IAQ (s04i):
    <?php
    $j = get_JSON_value('s04i');
    $v = $j["Value"];
    $d = $j["Date"];
    echo " ".$v." @ ".$d;
    ?>
    <br/>
    <img alt="wykres" src="rrd_graph.php?s04i;value;press;end-48h"/><br/>
    Temperatura zewnętrzna (battery - s05):
    <?php
    $j = get_JSON_value('s05');
    $v = $j["Value"];
    $d = $j["Date"];
    echo " ".$v." @ ".$d;
    ?>
    <br/>
    <img alt="wykres" src="rrd_graph.php?s05;value;temp;end-48h"/><br/>
    Temperatura zewnętrzna (battery - s06):
    <?php
    $j = get_JSON_value('s06');
    $v = $j["Value"];
    $d = $j["Date"];
    echo " ".$v." @ ".$d;
    ?>
    <br/>
    <img alt="wykres" src="rrd_graph.php?s06;value;temp;end-48h"/><br/>

</div>



</body>
</html>
