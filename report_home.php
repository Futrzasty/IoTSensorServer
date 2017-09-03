<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>IoT Server</title>
</head>
<body style="background-color: black; font-family: Arial, sans-serif;">

<div style="text-align: center; margin: auto; width: 100%; color: lightgray;">
    Temperatura:<br/>
    <img alt="wykres" src="rrd_graph.php?s01;value;temp;end-48h"/><br/>
    <img alt="wykres" src="rrd_graph.php?s02b;value;temp;end-48h"/><br/>
    Ciśnienie atmosferyczne:<br/>
    <img alt="wykres" src="rrd_graph.php?s02a;value;press;end-48h"/><br/>
</div>



</body>
</html>
