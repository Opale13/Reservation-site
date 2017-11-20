<?php
		if(isset($_SESSION['client']))
		{
			$client = unserialize($_SESSION['client']);
			$destination = $client->getdestination();

			include './templates/reserv.php';
		}
		else
		{
			$client = new client();
			$destination = $client->getdestination();

			$_SESSION['client'] = serialize($client);

			include './templates/reserv.php';
		}	
?>