<?php
	$client = unserialize($_SESSION['client']);

	$place = $client->getnbrplace();

	/*======================================================*/
	/*Management of the return button of the Validation page*/
	/*======================================================*/

	//Verification that all customers have been registered
	if (sizeof($client->getlist()) == $place)
	{

		//If we have not looked at all the customers yet
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

			//Returns values in the form
			$lastname = $listclient['lastname'];
			$firstname = $listclient['firstname'];
			$age = $listclient['age'];

			$client_count = $client->getcount(); //Counter recovery to display in title
			$client->setcount();			

			$_SESSION['client'] = serialize($client);
			include './templates/informations.php';
		}

		//If we checked all the clients
		else
		{
			$client->resetcount();

			$_SESSION['client'] = serialize($client);
			include './templates/validation.php';
		}		
	}

	/*=====================================================*/
	/*Management of the next button on the Information page*/
	/*=====================================================*/

	elseif (sizeof($client->getlist()) < $place)
	{
		if ($_POST['lastname'] != "" && $_POST['firstname'] != "" && $_POST['age'] != "")
		{
		//If we have not yet treated all passengers
			if ($client->getcount() < $place)
			{
				//Verification that all fields have been filled
				if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['age']))
				{
					$list = array();
					$list['firstname'] = $_POST['firstname'];
					$list['lastname'] = $_POST['lastname'];
					$list['age'] = $_POST['age'];
					$client->setlist($list);
				}

				$client->setcount(); //count +1
				$client_count = $client->getcount(); //Counter recovery to display in title 			

				$_SESSION['client'] = serialize($client);			
				include './templates/informations.php';
			}

			//If we checked all the clients
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
		else 
		{
			$warnning = "champ";
			$client_count = $client->getcount();

			$error = unserialize($_SESSION['error']);
			include './templates/informations.php';
		}
	}
	}

?>