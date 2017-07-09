<?php
	require_once ("config.php");

	# Lista paramertów wywołania (PLIK RRD, PARAMETR RRD, OPIS, START, WIDTH, HEIGHT)
	$fid = uniqid('rrd_', true);
	$file = "/tmp/$fid";

	$argv = explode(";", $_SERVER["QUERY_STRING"]);
	$argc = count($argv);
	$host = $argv[0];
	$param= $argv[1];

	$rrd_file = 's01.rrd';			    // 0
	$rrd_para = 'value';				// 1
	$rrd_desc = 'Wartosc ';	            // 2
	$rrd_start= 'end-4h';				// 3
	$rrd_width= '900';					// 4
	$rrd_heigh= '200';					// 5

	if (!isset($argv[0]) or !isset($argv[1])) {
		die ("Brak wymaganych parametrów");
	}
	else {
		$rrd_file = $argv[0];
		$rrd_para = $argv[1];
	}
	if (isset($argv[2])) $rrd_desc = urldecode($argv[2]);
	if (isset($argv[3])) $rrd_start = $argv[3];
	if (isset($argv[4])) $rrd_width = $argv[4];
	if (isset($argv[5])) $rrd_heigh = $argv[5];

	$opt_default = array( "--end", "now", "--start=$rrd_start", "--width=$rrd_width", "--height=$rrd_heigh", "--full-size-mode", "--border=0", "--color=BACK#444444", "--color=CANVAS#444444", "--color=FONT#cccccc", "--color=ARROW#222222",
					"DEF:param=$webserver_path/IoTSensorServer/rrd_data/$rrd_file:$rrd_para:AVERAGE",
					"LINE1:param#ff0000:$rrd_desc",
	);

    $opcja = $opt_default;

	$ret = rrd_graph($file, $opcja);

	header("Content-Type: image/png");
	header("Content-Length: ".filesize($file));

	$hand = fopen($file, "rb");
	if ($hand) {
		fpassthru($hand);
		fclose($hand);
	}
	system("rm -f $file");
