<?php
	//generate random string
	function generate_code()
	{
		$length = 11; //set character length here
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    echo $randomString;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table>
		<thead>
			<th>Checkpoint ID</th>
			<th>Team ID</th>
			<th>Pass Code</th>
			<th>Failed Code</th>
		</thead>	
		<tbody>
		<?php
			for($i=1; $i<=10; $i++){
		?>
			<?php for($j=1; $j<=20; $j++){ ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $j; ?></td>
				<td><?php generate_code(); ?></td>
				<td><?php generate_code(); ?></td>
			</tr>
			<?php } ?>
		<?php } ?>
		</tbody>
	</table>
</body>
</html>