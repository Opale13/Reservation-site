<?php

	$client = unserialize($_SESSION['client']);

	$majority = 18;
	$prix = 0;
	$alert = 'on';

	foreach ($client->getlist() as $information) 
	{
		//test si au moins une personne majeur est présente
		if ($information['age'] > $majority)
		{
			$alert = 'off';		
		}

		if ($information['age'] < 12)
		{
			$prix = $prix + 10;
		}
		else
		{
			$prix = $prix + 15;
		}
		
	}

	//si une assurance à été pris, on la compte
	if ($client->getassurance() != '')
	{
		$prix = $prix + 20;
	}

	//renvoie vers la page précedente si aucun majeur n'est présent
	if ($alert == 'on')
	{
		$_SESSION['alertmajority'] = 'on';
		include './templates/validation.php';
	}

	//renvoie la page précédente si tout est bon
	else
	{
		$_SESSION['prix'] = $prix;
		include './controllers/controller_db.php';
	}

?>