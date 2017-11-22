<?php

	$client = unserialize($_SESSION['client']);

	if(isset($_POST['nbr_place']) && $_POST['nbr_place'] != 0)
	{
		$place = $_POST['nbr_place'];
		settype($_POST['nbr_place'],"integer");

		$client->setnbrplace($place);
	}

	if(isset($_POST['destination']) && $_POST['destination'] != '')
	{
		$client->setdestination($_POST['destination']);
	}

	if(isset($_POST['assurance']))
	{
		$client->setassurance($_POST['assurance']);
	}

	//On fait la suite seulement si tous les champs sont remplit
	if ($_POST['nbr_place'] != 0 && $_POST['destination'] != '')
	{
		//direction vers ctrlvalid pour modifier les valeurs déjà enregistrées
		if(sizeof($client->getlist()) > 0)
		{
			$client->downcount();
			$_SESSION['client'] = serialize($client);
			include './controllers/controller_valid.php';
		}

		//dans le cas où on a pas encore encodé d'informations
		else
		{
			$client->resetcount();		
			$client_count = $client->getcount();

			$_SESSION['client'] = serialize($client);
			include './templates/informations.php';
		}
	}

	else
	{
		$warnning = "champ";	
		$destination = $client->getdestination();

		$_SESSION['client'] = serialize($client);
		$error = unserialize($_SESSION['error']);
		

		include './templates/reserv.php';		
	}

?>