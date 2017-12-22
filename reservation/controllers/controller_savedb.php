<?php

    $client = unserialize($_SESSION['client']);
    $clientList = $client->getlist();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "reservation";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    /*=================================*/
    /*Add data to the flight info table*/
    /*=================================*/
    $destination = $client->getdestination();
    $nbrplace = $client->getnbrplace();
    $prix = $_SESSION['prix'];

    if($client->getassurance() == "")
    {
        $assurance = "non";
    }
    else
    {
        $assurance = "oui";
    }

    $sql = "INSERT INTO infos_vols (Destination, Places, Prix, Assurance)
            VALUES ('" . $destination . "','". $nbrplace . "','" . $prix . "','". $assurance . "')";

    if ($conn->query($sql) == TRUE) 
    {
        $fly_id = $conn->insert_id;
    }


    /*==========================================*/
    /*Addition of data to the table infos_client*/
    /*==========================================*/    
    foreach ($clientList as $cl)
    {
        $lastname = $cl['lastname'];
        $firstname = $cl['firstname'];
        $age = $cl['age'];

        $sql = "INSERT INTO infos_clients (vols_id,Lastname, Firstname, Age)
                VALUES ('" . $fly_id. "','" .  $lastname . "','". $firstname . "','". $age . "')";

        if ($conn->query($sql) != TRUE) 
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();

    include './templates/confirmation.php';
?>