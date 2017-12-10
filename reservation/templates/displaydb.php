<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
		<link rel="stylesheet" href="./public/css/style.css" />
        <title>DataBase</title>
    </head>

    <body>
        <h1>Display DB</h1>
        <?php echo $display;?>

        <form method='post' action='index.php'>
            <input type='hidden' name='page' value='controller_reserv'/>								
			<input type='submit' class='btn' value='Retour'/>
        </form>
    </doby>
</html>