<?php
	$client = unserialize($_SESSION['client']);

	$place = $client->getnbrplace();

	/*==============================================*/
	/*Gestion du bouton retour de la page Validation*/
	/*==============================================*/

	//Verification que tout les clients ont été enregistrés
	if (sizeof($client->getlist()) == $place)
	{

		//si on a pas encore regardé tous les clients
		if ($client->getcount() <= $place)
		{	
			$client_count = $client->getcount();

			if ($client_count>1)
			{
				$listclient = $client->getlist()[$client_count-1];
			}
			else 
			{
				$listclient = $client->getlist()[0];
			}

			//renvoie des valeurs dans le formulaire
			$lastname = $listclient['lastname'];
			$firstname = $listclient['firstname'];
			$age = $listclient['age'];

			$client_count = $client->getcount(); //recuperation du counter pour afficher le titre
			$client->setcount();			

			$_SESSION['client'] = serialize($client);
			include './templates/informations.php';
		}

		//si on a vérifié tous les clients
		else
		{
			$client->resetcount();

			$_SESSION['client'] = serialize($client);
			include './templates/validation.php';
		}		
	}

	/*=================================================*/
	/*Gestion du bouton suivant de la page Informations*/
	/*=================================================*/

	elseif (sizeof($client->getlist()) < $place)
	{
		//Si on a pas encore traiter tout les passagers
		if ($client->getcount() < $place)
		{
			//Verification que tout les champs on été rempli
			if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['age']))
			{
				$list = array();
				$list['firstname'] = $_POST['firstname'];
				$list['lastname'] = $_POST['lastname'];
				$list['age'] = $_POST['age'];
				$client->setlist($list);
			}

			$client->setcount(); //count +1
			$client_count = $client->getcount(); //recup du counter pour le titre 			

			$_SESSION['client'] = serialize($client);			
			include './templates/informations.php';
		}

		//Dans le cas où on a traité tous les passagers
		else if($client->getcount() == $place)
		{
			if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['age']))
			{
				$list = array();
				$list['firstname'] = $_POST['firstname'];
				$list['lastname'] = $_POST['lastname'];
				$list['age'] = $_POST['age'];
				$client->setlist($list);
			}

			$client->resetcount();
			
			$_SESSION['client'] = serialize($client);			
			include './templates/validation.php';
		}
	}

?>