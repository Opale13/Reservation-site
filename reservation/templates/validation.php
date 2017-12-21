<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">	
		<link rel="stylesheet" href="./public/css/style.css" />
		<title>Validation</title>
	</head>

	<body>

		<?php 
			if (isset($_SESSION['alertmajority']) && $_SESSION['alertmajority'] == 'on')
			{
				echo "<h3>".
				 	 "Aucun majeur n'est present".
				 	 "</h3>";
			}			
		?>

		<h1>Validation des reservations</h1>

		<table class='table table-responsive'>

			<?php
			
				$client = unserialize($_SESSION['client']);
				$destination = $client->getdestination();
				$nbr_place = $client->getnbrplace();
				settype($nbr_place,"string");

				//Display 'non' if assurance is not choice
				if($client->getassurance() == '')
				{
					$assurance = "NON";
				}
				else
				{
					$assurance = "OUI";
				}

				//Formatting destination and number of places
				echo '<tr>'.
						'<td>Destination</td>'.
						'<td>'.
						    $destination.
				    	'</td>'.
				     '</tr>'.

				     '<tr>'.
						'<td>Nombre de place</td>'.
						'<td>'.
						    $nbr_place.
						'</td>'.
				     '</tr>'.
				     '<tr></tr>';
				     '<tr></tr>';

				//For each customer, we show his informations
				foreach($client->getlist() as $information)
				{
					echo '<tr>'.
							'<td>Prenom</td>'.
							'<td>'.
							    $information['lastname'].
					    	'</td>'.
					     '</tr>'.

					     '<tr>'.
							'<td>Nom</td>'.
							'<td>'.
							    $information['firstname'].
					    	'</td>'.
					     '</tr>'.

					     '<tr>'.
							'<td>Age</td>'.
							'<td>'.
							    $information['age'].
					    	'</td>'.
					     '</tr>'.

					     '<tr></tr>';
				     	 '<tr></tr>';;
				}

				//View if insurance has been taken
				echo '<tr>'.
						'<td>Assurance</td>'.
						'<td>'.
							$assurance.
						'</td>'.
					 '</tr>';
			
			?>

		</table>

		<table>
			<tr>
				<td>
					<form method='post' action='index.php'>
						<input type='hidden' name='page' value='controller_confirmation'/>
						<input type='submit' class="btn btn-secondary btn-sm" value='Confirmation'/>
					</form>
				</td>

				<td>
					<form method='post' action='index.php'>
						<input type='hidden' name='page' value='controller_valid'/>
						<input type='submit' class="btn btn-secondary btn-sm" value='Retour' />
					</form>
				</td>

				<td>
					<form method='post' action='index.php'>
						<input type='hidden' name='page' value='controller_annulation'/>
						<input type='submit' class="btn btn-secondary btn-sm" value='Annuler'/>
					</form>
				</td>

			</tr>
		</table>
		
	</body>
</html>