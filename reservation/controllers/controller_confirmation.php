<?php

	$client = unserialize($_SESSION['client']);

	$majority = 18;
	$prix = 0;
	$alert = 'on';

	foreach ($client->getlist() as $information) 
	{
		//Test if at least one adult is present
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

	//If insurance has been taken, it counts
	if ($client->getassurance() != '')
	{
		$prix = $prix + 20;
	}

	/*===============================*/
	/*If the order does not exist yet*/
	/*===============================*/
	if ($client->getidvol() == -1)
	{
		//Return to the previous page if no major is present
		if ($alert == 'on')
		{
			$_SESSION['alertmajority'] = 'on';
			include './templates/validation.php';
		}

		//Returns the next page if everything is good
		else
		{
			$_SESSION['prix'] = $prix;
			include './controllers/controller_savedb.php';
		}
	}

	/*========================================*/
	/*If the command already exists, modify it*/
	/*========================================*/
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

		//Modification in the table containing flight information
		$ID = $client->getidvol();
		$destination = $client->getdestination();
		$places = $client->getnbrplace();

		if($client->getassurance() == '')
		{
			$assurance = "non";
		}
		else
		{
			$assurance = "oui";
		}

		$sql = "UPDATE infos_vols SET Destination='$destination',
									  Places='$places',
									  Prix='$prix',
									  Assurance='$assurance'
				WHERE ID = $ID";

		$conn->query($sql);


		//Modification in the table containing the customer information		
		foreach ($client->getlist() as $information)
		{
			if (isset($information['ID']))
			{
				$id_client = $information['ID'];
				$lastname = $information['lastname'];
				$firstname = $information['firstname'];
				$age = $information['age'];

				$sql = "UPDATE infos_clients SET Lastname='$lastname',
												Firstname='$firstname',
												Age='$age'
						WHERE ID = $id_client";
					
				$conn->query($sql);	
			}
			else
			{
				$fly_id = $client->getidvol();
				$lastname = $information['lastname'];
				$firstname = $information['firstname'];
				$age = $information['age'];				

				$sql = $sql = "INSERT INTO infos_clients (vols_id,Lastname, Firstname, Age)
                VALUES ('" . $fly_id. "','" .  $lastname . "','". $firstname . "','". $age . "')";
					
				$conn->query($sql);
			}
		}

		$conn->close();

		$message = "<p>Informations modifiees avec succes</p>";

		include './templates/modifydb.php';
	}
?>