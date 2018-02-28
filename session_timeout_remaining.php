<?php
	$maxlifetime = ini_get("session.gc_maxlifetime");
	echo "MAX SESSION TIMEOUT: " . $maxlifetime;	
?>