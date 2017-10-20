<?php
session_start();
require_once("client.php");

var_dump($_POST);

if(!empty($_POST['page']) && is_file($_POST['page'].'.php'))
{
	include $_POST['page'].'.php';
}
else
{
	$client = new client();
	
	$_SESSION['client'] = serialize($client);
	
	include 'reserv.php';
}

?>