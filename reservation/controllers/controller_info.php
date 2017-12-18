<?php
	/*Controller that processes information from the "reserv.php" view*/

	$client = unserialize($_SESSION['client']);
	$client->resetcount();

	if(isset($_POST['nbr_place']) && $_POST['nbr_place'] == $client->getnbrplace())
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
	else
	{
		$client->setassurance('');
	}
	
	//On fait la suite seulement si tous les champs sont remplit
	if ($_POST['nbr_place'] == $client->getnbrplace() && $_POST['destination'] != '')
	{
		//direction vers ctrlvalid pour modifier les valeurs déjà enregistrées
		if(sizeof($client->getlist()) >= $client->getnbrplace())
		{			
			$_SESSION['client'] = serialize($client);
			include './controllers/controller_valid.php';
		}

		//dans le cas où on a pas encore encodé d'informations
		else
		{	
			$client_count = $client->getcount();
			$_SESSION['client'] = serialize($client);
			include './templates/informations.php';
		}
	}
	//erreur champ manquant
	else
	{
		if ($_POST['nbr_place'] != $client->getnbrplace())
		{
			$warnning = "place";	
			$destination = $client->getdestination();

			$_SESSION['client'] = serialize($client);
			$error = unserialize($_SESSION['error']);
		}
		else
		{
			$warnning = "champ";	
			$destination = $client->getdestination();

			$_SESSION['client'] = serialize($client);
			$error = unserialize($_SESSION['error']);
		}

		include './templates/reserv.php';		
	}

?>