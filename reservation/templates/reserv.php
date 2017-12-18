<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">	
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

		<table class='table table-responsive'>
			<form method='post' action='index.php'>
				<input type='hidden' name='page' value='controller_info'/>

				<div class='form-group'>
					<tr>					
						<td>Destination</td>
						<td>
							<select class="form-control" name='destination' size='1' selected='<?php if($destination != '') echo $destination;?>'>
								<option></option>
								
								<option value='Londres' <?php if ($destination == 'Londres') echo 'selected="selected"';?>>Londres</option>

								<option value='Bruxelles' <?php if ($destination == 'Bruxelles') echo 'selected="selected"';?>>Bruxelles</option>

								<option value='Madrid' <?php if ($destination == 'Madrid') echo 'selected="selected"';?>>Madrid</option>

								<option value='Paris' <?php if ($destination == 'Paris') echo 'selected="selected"';?>>Paris</option>

								<option value='Amsterdam' <?php if ($destination == 'Amsterdam') echo 'selected="selected"';?>>Amsterdam</option>

								<option value='Venise' <?php if ($destination == 'Venise') echo 'selected="selected"';?>>Venise</option>

								<option value='Tokyo' <?php if ($destination == 'Tokyo') echo 'selected="selected"';?>>Tokyo</option>
							</select>
						</td>
					</tr>
				</div>
				
				<div class="form-group">
					<tr>
						<td>Nombres de places</td>
						<td>
							<input class="form-control" type='text' name='nbr_place' value='<?php if($client->getnbrplace() != 0) echo $client->getnbrplace();?>'/>
						</td>
					</tr>
				</div>
				
				<div class="form-check disabled">
					<tr>
						<td>Assurance annulation</td>
						<td>
							<input class="form-check-input" type='checkbox' name='assurance' <?php echo ($client->getassurance()=='' ? '' : 'checked="checked"'); ?>/>
						</td>
					</tr>
				</div>
		</table>

		<table id='foot'>
				<tr>
					<td><input type='submit' class="btn btn-secondary btn-sm" value='Etape suivante'/></td>	
			</form>		

					<form method='post' action='index.php'>
						<td>										
							<input type='hidden' name='page' value='controller_annulation'/>								
							<input type='submit' class="btn btn-secondary btn-sm" value='Annuler la réservation'/>				
						</td>
					</form>

					<form method='post' action='index.php'>
						<td>										
							<input type='hidden' name='page' value='controller_displaydb'/>								
							<input type='submit' class="btn btn-secondary btn-sm" value='Display DB'/>				
						</td>
					</form>
				</tr>

		</table>							
	</body>
</html>