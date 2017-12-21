<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">	
		<link rel="stylesheet" href="./public/css/style.css" /><link rel="stylesheet" href="./public/css/style.css" />
		<title>Confirmation</title>
	</head>

	<body>

		<h1>Confirmation des reservations</h1>

		<p>
			Votre demande a bien ete enregistree.</br>
			Merci de bien vouloir verser la somme de <?php echo $_SESSION['prix'];?> euros
			sur le compte 000-000000-00.
		</p>

		<form method='post' action='index.php'>
			<input type='hidden' name='page' value='controller_annulation'/> 
			<input type='submit' class="btn btn-secondary btn-sm" value="Retour page d'acceuil"/>
		</form>

	</body>
</html>