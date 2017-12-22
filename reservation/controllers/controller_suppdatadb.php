<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "reservation";

    $ID = $_POST['VolID'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM infos_vols WHERE id=$ID";

    $conn->query($sql);

    $conn->close();

    $message = "<p>Informations supprimees avec succes</p>";
    
    include './templates/modifydb.php';
?>