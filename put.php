<?php
/**
 * Created by PhpStorm.
 * User: Mruczek
 * Date: 2017-07-09
 * Time: 22:12
 */

require_once 'config.php';

if (isset($_GET["sensor"])) {
    $sensor = $_GET["sensor"];
} else {
    $sensor = 0;
}
if (isset($_GET["value"])) {
    $value = $_GET["value"];
} else {
    $value = 0;
}

if (isset($_GET["auth"])) {
    $auth = $_GET["auth"];
} else {
    $auth = 0;
}

?>
<!DOCTYPE html>
    <html lang="pl">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
<?php

$rrd_file = $webserver_path."IoTSensorServer/rrd_data/".$sensor;
if (file_exists($rrd_file)) {
    rrd_update($rrd_file, array("N:$value"));
}
echo "Received data from sensor=$sensor, value=$value";

?>
    </body>
</html>
