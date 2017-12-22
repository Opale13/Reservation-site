<?php

    $vol_ID = $_POST['VolID'];
    $cl = array();
    $client = new client();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "reservation";

    $conn = new mysqli($servername, $username, $password, $dbname);
    
    //Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT infos_vols.Destination, infos_vols.Places, infos_vols.Prix,
                   infos_vols.Assurance, infos_clients.ID, infos_clients.Lastname, infos_clients.Firstname, 
                   infos_clients.Age
            FROM infos_vols
            INNER JOIN infos_clients 
            WHERE infos_clients.vols_id = infos_vols.ID && infos_clients.vols_id = $vol_ID";

    $result = $conn->query($sql);
    
    //Creating a new client object for modifs
    while ($line = $result->fetch_assoc())
    {
        $client->setdestination($line['Destination']);
        $client->setnbrplace($line['Places']);

        $cl['ID'] = $line['ID'];
        $cl['firstname'] = $line['Firstname'];
        $cl['lastname'] = $line['Lastname'];
        $cl['age'] = $line['Age'];
        
        if ($line['Assurance'] == "non")
		{
            $client->setassurance("");       
		}
		else
		{
            $client->setassurance("on");
		}

        $client->setlist($cl);
        $client->setidvol($vol_ID);  
        
    }
    
    $_SESSION['client'] = serialize($client);

    $conn->close();

    include './controllers/controller_reserv.php';

?>