<?php
	/*Allows redirection of controllers*/

	session_start();
	
	require_once("client.php");
	require_once("error.php");

	var_dump($_POST);
	
	//We check if the page value contains something and if the controller exists
	if(!empty($_POST['page']) && is_file('./controllers/'.$_POST['page'].'.php'))
	{
		include './controllers/'.$_POST['page'].'.php';	
	}
	//Default value if nothing is found
	else
	{
		include './controllers/controller_reserv.php';
	}

?>