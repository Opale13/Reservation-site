<?php

	$client = unserialize($_SESSION['client']);

	$place = $client->getnbrplace();

	//si on décide de modifier les valeurs des formulaires déjà encodées
	if (sizeof($client->getlist()) == $place && $client->getcount() < $place)
	{
		//Vérification qu'on appui sur le bouton suivant de la page informations
		if (isset($_POST['order']) && $_POST['order'] == 'next')
		{
			$list = $client->getlist()[$client->getcount()];

			$list['firstname'] = $_POST['firstname'];
			$list['lastname'] = $_POST['lastname'];
			$list['age'] = $_POST['age'];

			$client->modifylist($client->getcount(), $list);

			$client->setcount();
		}

		//si on a pas encore tout checké
		if ($client->getcount() <= $place - 1)
		{	
			$listclient = $client->getlist()[$client->getcount()];	

			$lastname = $listclient['lastname'];
			$firstname = $listclient['firstname'];
			$age = $listclient['age'];

			$_SESSION['client'] = serialize($client);
			include 'informations.php';
		}
		//sinon on passe à la prochaine page
		else
		{
			$client->resetcount();

			$_SESSION['client'] = serialize($client);
			include 'validation.php';
		}
		
	}

	//Dans le cas où on on créé pour la premiere fois les passagers
	elseif(sizeof($client->getlist()) <= $place)
	{
		$client->iterateur();

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

			$_SESSION['client'] = serialize($client);			
			include 'informations.php';
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
			
			$_SESSION['client'] = serialize($client);			
			include 'validation.php';
		}
	}

?>