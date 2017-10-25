<html>
	<head>
		<title>Validation</title>
	</head>

	<body>

		<table>

			<?php
			
				$client = unserialize($_SESSION['client']);
				$destination = $client->getdestination();
				$nbr_place = $client->getnbrplace();
				settype($nbr_place,"string");

				if($client->getassurance() == "")
				{
					$assurance = "NON";
				}
				else
				{
					$assurance = "OUI";
				}

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

				echo '<tr>'.
						'<td>Assurance</td>'.
						'<td>'.
							$assurance.
						'</td>'.
					 '</tr>';
			
			?>

		</table>
	</body>
</html>