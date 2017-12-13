<?php

	$client = unserialize($_SESSION['client']);
	var_dump($client->getidvol());

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

	if ($client->getidvol() == -1)
	{
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
			include './controllers/controller_savedb.php';
		}
	}
	else
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "reservation";
		
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		echo "Connected successfully";

		$ID = $client->getidvol();
		$destination = $client->getdestination();
		$places = $client->getnbrplace();

		$sql = "UPDATE infos_vols SET Destination='$destination',
									  Places='$places'
				WHERE ID = $ID";

		var_dump($sql);
		$conn->query($sql);
		$conn->close();
		include './controllers/controller_annulation.php';
	}
?>