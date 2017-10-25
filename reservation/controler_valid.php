<?php

	$client = unserialize($_SESSION['client']);

	$client->iterateur();

	if($client->getiterateur() > 0)
	{
		if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['age']))
		{
			$list = array();
			$list['firstname'] = $_POST['firstname'];
			$list['lastname'] = $_POST['lastname'];
			$list['age'] = $_POST['age'];
			$client->setlist($list);
		}

		$_SESSION['client'] = serialize($client);
		
		include 'informations.php';
	}
	else if($client->getiterateur() == 0)
	{
		if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['age']))
		{
			$list = array();
			$list['firstname'] = $_POST['firstname'];
			$list['lastname'] = $_POST['lastname'];
			$list['age'] = $_POST['age'];
			$client->setlist($list);
		}
		
		$_SESSION['client'] = serialize($client);
		
		include 'validation.php';
	}

?>