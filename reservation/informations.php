<html>
	<head>
		<title>Informations</title>
	</head>
	<body>
		
		<table>	

			<form method='post' action='index.php'>	
				<tr>
					<td>Firstname</td>
					<td><input type='text' name='firstname'/></td>
					<td></td>
				</tr>
				
				<tr>
					<td>Lastname</td>
					<td><input type='text' name='lastname'/></td>
					<td></td>
				</tr>
				
				<tr>
					<td>Age</td>
					<td><input type='text' name='age'/></td>
					<td></td>
				</tr>		
								
				<tr>
					<input type='hidden' name='page' value='controler_valid'/>
					<td><input type='submit' value='Etape suivante'/></td>
			</form>	

					<form method='post' action='index.php'>
						<td>
							<input type='hidden' name='page' value='controller_info'/>
							<input type='submit' value='Page précédente'/>
						</td>
					</form>

					<form method='post' action='index.php'>
						<td>				
							<input type='hidden' name='page' value='annulation'/>								
							<input type='submit' value='Annuler la réservation'/>				
						</td>
					</form>
				</tr>	
		</table>
					
	</body>
</html>