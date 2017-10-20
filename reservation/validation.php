<html>
	<head>
		<title>Validation</title>
	</head>

	<body>
		<?php
		
		$client = unserialize($_SESSION['client']);
		foreach($client->getlist() as $print)
		{
			print_r($print);
			echo "<br/>";
		}
		
		?>
	</body>
</html>