<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "reservation";

    $display = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    echo "Connected successfully";

    $sql = "SELECT infos_vols.ID, infos_vols.Destination, infos_vols.Places, infos_vols.Prix,
                   infos_vols.Assurance, infos_clients.Lastname, infos_clients.Firstname, infos_clients.Age
            FROM infos_vols
            INNER JOIN infos_clients 
            WHERE infos_clients.vols_id = infos_vols.ID";

    $result = $conn->query($sql);
    
    
    $display = $display . "<table><tr>";
    while ($info=$result->fetch_field())
    {
        $display = $display . "<td>".$info->name."</td>";
    }
    $display = $display . "</tr>";
    
    while ($line=$result->fetch_assoc())
    {
        $display = $display . "<tr>";
        
        foreach ($line as $col_value)
        {
            $display = $display . "<td>".$col_value."</td>";
        }
        $display = $display . "</tr>";
    }
    $display = $display . "</table>";

    $conn->close();

    include './templates/displaydb.php'

?>