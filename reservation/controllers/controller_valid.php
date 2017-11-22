<?php

/*===============================/!\===============================*/
/*                           A REMODELER                           */
/*===============================/!\===============================*/

	$client = unserialize($_SESSION['client']);

	$place = $client->getnbrplace();

	//si on décide de modifier les valeurs des formulaires déjà encodées
	if (sizeof($client->getlist()) == $place && $client->getcount() <= $place)
	{
		//Vérification qu'on appui sur le bouton suivant de la page informations
		if (isset($_POST['order']) && $_POST['order'] == 'next')
		{
			$list = $client->getlist()[$client->getcount()-1];

			$list['firstname'] = $_POST['firstname'];
			$list['lastname'] = $_POST['lastname'];
			$list['age'] = $_POST['age'];

			$client->modifylist($client->getcount()-1, $list);

			$client->setcount();
		}

		//si on a pas encore tout checké
		if ($client->getcount() <= $place)
		{	
			$client_count = $client->getcount();

			$listclient = $client->getlist()[$client_count-1];

			//renvoie des valeurs dans le formulaire
			$lastname = $listclient['lastname'];
			$firstname = $listclient['firstname'];
			$age = $listclient['age'];

			$client_count = $client->getcount();			

			$_SESSION['client'] = serialize($client);
			include './templates/informations.php';
		}
		//sinon on passe à la prochaine page
		else
		{
			$client->resetcount();

			$_SESSION['client'] = serialize($client);
			include './templates/validation.php';
		}		
	}

	//Dans le cas où on encode pour la premiere fois les données
	elseif(sizeof($client->getlist()) < $place+1)
	{
		$client->setiterateur();

		//Si on a pas encore traiter tout les passagers
		if($client->getiterateur() > 0)
		{
			//Verification que tout les champs on été rempli
			if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['age']))
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

			$client->resetcount();
			
			$_SESSION['client'] = serialize($client);			
			include './templates/validation.php';
		}
	}

?>