<?php

	// crypt() is a password hashing feature which provided by PHP library starting from version 5.3.0
	// This function will automatically generate hashed password with salt.
	// Sample hashed password: $1$tK3.yr..$1tjtPtx3yjqOaK6wj9oQr/ 

	if(isset($_POST['password'])){		
		$hash = crypt($_POST['password']);
		echo "ENCRYPTED CODE: " . $hash . "<hr>";
	}

	// // password_verify('the_password', $hash)
	// $verify = password_verify("1234", $hash);
	// echo $verify; // 1: TRUE, null: FALSE
	
?>
<form method="post">
	<input type="text" name="password"> <button>Encrypt!</button>
</form>