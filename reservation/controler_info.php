<?php

$client = unserialize($_SESSION['client']);

if(isset($_POST['nbr_place']))
{
	$place = $_POST['nbr_place'];
	settype($_POST['nbr_place'],"integer");

	$client->setnbrplace($place);
}

if(isset($_POST['destination']))
{
	$client->setdestination($_POST['destination']);
}

if(isset($_POST['assurance']))
{
	$client->setassurance($_POST['assurance']);
}

$_SESSION['client'] = serialize($client);

include 'informations.php';

?>