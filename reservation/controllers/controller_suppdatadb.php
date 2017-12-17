<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "reservation";

    $ID = $_POST['VolID'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    echo "Connected successfully";

    $ID = $_POST['VolID'];

    $sql = "DELETE FROM infos_vols WHERE id=$ID";

    $conn->query($sql);
    $conn->close();

    $message = "<p>Informations supprimées avec succès</p>";
    
    include './templates/modifydb.php';
?>