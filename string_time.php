<?php
	// $stime1 = strtotime("00:10:00");
	$stime1 = strtotime("00:10:00");
	$time1 = date("H:i:s", $stime1);

	// $stime2 = strtotime("00:07:00");
	$stime2 = strtotime("00:07:00");
	$time2 = date("H:i:s", $stime2);

	$diff = $stime1-$stime2;
	// $time_diff = date("H:i:s", $diff);

	// CONVERT SECONDS TO HOUR:MINUTE:SEC
	$diff_h = floor($diff / 3600);
	if ($diff_h < 10) { $diff_h = "0".$diff_h; }
	$diff_m = floor($diff / 60 % 60);
	if ($diff_m < 10) { $diff_m = "0".$diff_m; }
	$diff_s = floor($diff % 60);
	if ($diff_s < 10) { $diff_s = "0".$diff_s; }
	// END: CONVERT SECONDS TO HOUR:MINUTE:SEC

	echo $stime1 . "<br>";
	echo $stime2 . "<br>";
	echo $diff . "<br>";
	echo $diff_h . "<br>";
	echo $diff_m . "<br>";
	echo $diff_s . "<br>";
	echo "<hr>";
	echo $time1 . "<br>";
	echo $time2 . "<br>";
	echo $time_diff . "<br>";
?>