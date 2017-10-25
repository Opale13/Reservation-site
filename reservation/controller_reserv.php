<?php
		if(isset($_SESSION['client']))
		{
			$client = unserialize($_SESSION['client']);
			$destination = $client->getdestination();

			include 'reserv.php';
		}
		else
		{
			$client = new client();
		
			$_SESSION['client'] = serialize($client);

			include 'reserv.php';
		}		

?>