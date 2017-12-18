<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">	
		<link rel="stylesheet" href="./public/css/style.css" />
		<title>ModifyDB</title>
	</head>

	<body>

		<h1>Modification de la base de données</h1>

        <?php echo $message; ?>
        

		<form method='post' action='index.php'>
			<input type='hidden' name='page' value='controller_annulation'/> 
			<input type='submit' class="btn btn-secondary btn-sm" value="Retour page d'acceuil"/>
		</form>

	</body>
</html>