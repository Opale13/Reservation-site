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
		$error = new error();
		
		$destination = $client->getdestination();

		$_SESSION['client'] = serialize($client);
		$_SESSION['error'] = serialize($error);

		include './templates/reserv.php';
	}	
?>