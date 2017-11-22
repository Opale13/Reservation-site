<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="./public/css/style.css" />
		<title>Confirmation</title>
	</head>

	<body>

		<h1>Confirmation des reservations</h1>

		<p>
			Votre demande à bien été enregistrée.</br>
			Merci de bien vouloir verser la somme de <?php echo $_SESSION['prix'];?> euros
			sur le compte 000-000000-00.
		</p>

		<form method='post' action='index.php'>
			<input type='hidden' name='page' value='controller_annulation'/> 
			<input type='submit' class='btn' value="Retour page d'acceuil"/>
		</form>

	</body>
</html>