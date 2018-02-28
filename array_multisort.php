<?php
	// ASSOCIATIVE ARRAY MULTI-SORT
	// 18/09/2017
	// MUHAMMAD SHAKIRIN BIN SAMIN


	$team = array();
	$team[] = array("team_id" => 1, "score" => 15, "time" => 4860);
	$team[] = array("team_id" => 2, "score" => 16, "time" => 7380);
	$team[] = array("team_id" => 3, "score" => 7, "time" => 6780);

	foreach ($team as $key => $row) {
		$score[$key] = $row['score'];
		$time[$key] = $row['time'];
	}

	array_multisort($score, SORT_DESC, $time, SORT_ASC, $team);

	echo "<pre>";
	print_r($team);
	echo "</pre>";

	echo "<hr>";
	echo "<table border='1'>";
	echo "<tr><th>Team ID</th><th>Total Score</th><th>Total Time Checkpoints</th></tr>";
	foreach ($team as $key => $row_val) {
		echo "<tr>";
		echo "<td>".$row_val['team_id']."</td>";
		echo "<td>".$row_val['score']."</td>";
		echo "<td>".$row_val['time']."</td>";
		echo "</tr>";
	}
?>