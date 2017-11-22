<?php
	session_start();
	
	require_once("client.php");
	require_once("error.php");

	var_dump($_POST);
	
	if(!empty($_POST['page']) && is_file('./controllers/'.$_POST['page'].'.php'))
	{
		include './controllers/'.$_POST['page'].'.php';	
	}
	else
	{
		include './controllers/controller_reserv.php';
	}
?>