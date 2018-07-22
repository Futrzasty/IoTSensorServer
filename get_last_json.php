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

if (isset($_GET["auth"])) {
    $auth = $_GET["auth"];
} else {
    $auth = 0;
}

$value = array();

$rrd_file = $webserver_path."IoTSensorServer/rrd_data/".$sensor.".rrd";
if (file_exists($rrd_file)) {
//    echo $rrd_file.PHP_EOL;
    $value = rrd_lastupdate($rrd_file);
} else {
    echo "No such sensor";
}
//var_dump($value);
//echo "<br/>";
//echo date(DATE_RFC2822, $value["last_update"]);
//echo $value["data"][0];
//echo "Received data from sensor=$sensor, value=$value";
$output = array ('Date' => date(DATE_RFC2822, $value["last_update"]), 'Value' => $value["data"][0]);
echo json_encode($output);
