<html>
	<head>
		<title>Reservation</title>
	</head>
	
	<body>
		<h1>Reservation</h1>
		<h2>Le prix de la place est de 10 euros jusqu'a 12 ans et
		ensuite de 15 euros. <br/>
		Le prix de l'assurance annulation est de 20 euros quel que
		soit le nombre de voyageurs.</h2>

		<form method='post' action='index.php'>
			<table>
				<tr>
					<td>Destination</td>
					<td>
						<select name='destination' size="1">
							<Option>Londres
							<Option>Bruxelles
							<Option>Madrid
						</select>
					</td>
				</tr>
				
				<tr>
					<td>Nombres de places</td>
					<td><input type='text' name='nbr_place'/></td>
				</tr>
				
				<tr>
					<td>Assurance annulation</td>
					<td><input type='checkbox' name='assurance'/></td>
				</tr>
		
				<tr>
					<td><input type='submit' value='Suivant'/></td>
					<td></td>
				</tr>
			</table>
			
			<input type='hidden' name='page' value='controler_info'/>
		</form>	
	</body>
</html>