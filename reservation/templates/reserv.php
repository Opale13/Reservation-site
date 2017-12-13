<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="./public/css/style.css" />		
		<title>Reservation</title>
	</head>
	
	<body>

		<?php
			if (isset($warnning) && $warnning != '')
			{
				$error->runError($warnning);
			}
		?>

		<h1>Reservation</h1>
		<h2>
			Le prix de la place est de 10 euros jusqu'a 12 ans et
			ensuite de 15 euros. <br/>
			Le prix de l'assurance annulation est de 20 euros quel que
			soit le nombre de voyageurs.
		</h2>

		<table>
			<form method='post' action='index.php'>
				<input type='hidden' name='page' value='controller_info'/>
				<tr>
					<td>Destination</td>
					<td>
						<select name='destination' size='1' selected='<?php if($destination != '') echo $destination;?>'>
							<option></option>
							
							<option value='Londres' <?php if ($destination == 'Londres') echo 'selected="selected"';?>>Londres</option>

							<option value='Bruxelles' <?php if ($destination == 'Bruxelles') echo 'selected="selected"';?>>Bruxelles</option>

							<option value='Madrid' <?php if ($destination == 'Madrid') echo 'selected="selected"';?>>Madrid</option>

							<option value='Paris' <?php if ($destination == 'Paris') echo 'selected="selected"';?>>Paris</option>

							<option value='Amsterdam' <?php if ($destination == 'Amsterdam') echo 'selected="selected"';?>>Amsterdam</option>

							<option value='Venise' <?php if ($destination == 'Venise') echo 'selected="selected"';?>>Venise</option>
						</select>
					</td>
				</tr>
				
				<tr>
					<td>Nombres de places</td>
					<td>
						<input type='text' name='nbr_place' value='<?php if($client->getnbrplace() != 0) echo $client->getnbrplace();?>'/>
					</td>
				</tr>
				
				<tr>
					<td>Assurance annulation</td>
					<td><input type='checkbox' name='assurance'/></td>
				</tr>
		</table>

		<table id='foot'>
				<tr>
					<td><input type='submit' class='btn' value='Etape suivante'/></td>	
			</form>		

					<form method='post' action='index.php'>
						<td>										
							<input type='hidden' name='page' value='controller_annulation'/>								
							<input type='submit' class='btn' value='Annuler la réservation'/>				
						</td>
					</form>

					<form method='post' action='index.php'>
						<td>										
							<input type='hidden' name='page' value='controller_displaydb'/>								
							<input type='submit' class='btn' value='Display DB'/>				
						</td>
					</form>
				</tr>

		</table>							
	</body>
</html>