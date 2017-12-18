<?php
	/*Initial controller*/

	//In case a session already exists
	if(isset($_SESSION['client']))
	{
		$client = unserialize($_SESSION['client']);
		
		$destination = $client->getdestination();

		include './templates/reserv.php';
	}
	//We create a session if it does not exist
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