<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "reservation";

    $display = "";
    $save_ID = 0;
    $save_line = array();

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
    
    
    //Affichage des champs
    $display = $display . "<table><tr>";
    while ($info=$result->fetch_field())
    {
        $display = $display . "<td>".$info->name."</td>";
    }
    $display = $display . "<td>"."Modifier"."</td>";
    $display = $display . "</tr>";
    
    //Affichage des données
    while ($line=$result->fetch_assoc())
    {
        $display = $display . "<tr>";
        
        //Si l'ID du vole actuel est différent du précedent
        if ($line['ID'] != $save_ID)
        {
            $save_ID = $line['ID'];
            $save_line[0] = $line;

            foreach ($line as $col_value)
            {
                $display = $display . "<td>" . $col_value . "</td>";
            }

            $display = $display . "<td>";
            $display = $display . "<form method='post' action='index.php'>";
            $display = $display . "<input type='hidden' name='page' value='controller_displaydatabd'/>";
            $display = $display . "<input type='hidden' name='VolID' value='".$line['ID']."'/>";
            $display = $display . "<input type='submit' value='Modifier'/>";
            $display = $display . "</form>";
            $display = $display . "</td>";

            $display = $display . "</tr>";
        }
        else 
        {
            foreach($line as $col_value)
            {
                if ($col_value != $line['Age'] && in_array($col_value, $save_line[0]))
                {
                    $display = $display . "<td>" . "</td>";
                }
                else
                {
                    $display = $display . "<td>" . $col_value . "</td>";
                }
            }            
            $display = $display . "</tr>";            
        }       
        
    }
    $display = $display . "</table>";

    $conn->close();

    include './templates/displaydb.php';

?>