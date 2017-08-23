<?php
	if(isset($_POST['myname'])){
		$method = "POST";
		$key = "myname";
		$value = $_POST['myname'];
	}
	else if(isset($_GET['myname'])){
		$method = "GET";
		$key = "myname";
		$value = $_GET['myname'];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	Method: [ <b><?php echo $method;?></b> ] <br><br> 

	Key/Variable: <b><?php echo $key; ?></b> <br><br>

	Value/Data: <b><?php echo $value; ?></b> <br><br>

	<?php if(isset($_GET['myname'])) { ?>
		<i>P/S: Notice "?" sign in your address bar? "?<b>key</b>=<b>value</b>". This is where your data goes on GET method. ;)</i> 
	<?php } ?>
	<br><br>

	<a href="post.php">Try POST form method!</a> | <a href="get.php">Try GET form method!</a>
</body>
</html>