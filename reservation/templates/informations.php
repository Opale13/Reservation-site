<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">	
		<link rel="stylesheet" href="./public/css/style.css" />
		<title>Informations</title>
	</head>
	<body>

		<?php
			if (isset($warnning) && $warnning != '')
			{
				$error->runError($warnning);
			}
			
			echo "<h1>Passager".
				 $client_count.
				 "</h1>"
		?>

			<table class='table table-responsive'>	
			<form method='post' action='index.php'>	
				<input type='hidden' name='page' value='controller_valid'/>
				<input type='hidden' name='order' value='next'/>
				<tr>
					<td>Firstname</td>
					<td><input type='text' name='firstname' value ='<?php if(isset($firstname))
					echo $firstname;?>'/></td>
					<td></td>
				</tr>
				
				<tr>
					<td>Lastname</td>
					<td><input type='text' name='lastname' value ='<?php if(isset($lastname))
					echo $lastname;?>'</td>
					<td></td>
				</tr>
				
				<tr>
					<td>Age</td>
					<td><input type='text' name='age' value ='<?php if(isset($age))
					echo $age;?>'/></td>
					<td></td>
				</tr>
		</table>

		<table id="foot">		
								
				<tr>					
					<td><input type='submit' class="btn btn-secondary btn-sm" value='Etape suivante'/></td>
			</form>	

					<form method='post' action='index.php'>
						<td>
							<input type='hidden' name='page' value='controller_reserv'/>
							<input type='submit' class="btn btn-secondary btn-sm" value='Page precedente'/>
						</td>
					</form>

					<form method='post' action='index.php'>
						<td>				
							<input type='hidden' name='page' value='controller_annulation'/>								
							<input type='submit' class="btn btn-secondary btn-sm" value='Annuler la reservation'/>				
						</td>
					</form>
				</tr>	
		</table>
					
	</body>
</html>