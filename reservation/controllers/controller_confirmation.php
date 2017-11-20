<?php

	$client = unserialize($_SESSION['client']);

	$majority = 18;
	$prix = 0;
	$alert = 'on';

	foreach ($client->getlist() as $information) 
	{
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

	if ($client->getassurance() != '')
	{
		$prix = $prix + 20;
	}

	if ($alert == 'on')
	{
		$_SESSION['alertmajority'] = 'on';
		include './templates/validation.php';
	}
	else
	{
		$_SESSION['prix'] = $prix;
		include './templates/confirmation.php';
	}

?>