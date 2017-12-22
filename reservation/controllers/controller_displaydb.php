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
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT infos_vols.ID, infos_vols.Destination, infos_vols.Places, infos_vols.Prix,
                   infos_vols.Assurance, infos_clients.Lastname, infos_clients.Firstname, infos_clients.Age
            FROM infos_vols
            INNER JOIN infos_clients 
            WHERE infos_clients.vols_id = infos_vols.ID";

    $result = $conn->query($sql);
    
    
    //Fields display
    $display .= "</br><table class='table table-responsive'><tr>";
    while ($info = $result->fetch_field())
    {
        $display .= "<td>".$info->name."</td>";
    }
    $display .=  "<td>"."Modifier"."</td>";
    $display .=  "<td>"."Supprimer"."</td>";
    $display .=  "</tr>";
    
    //Display of data
    while ($line = $result->fetch_assoc())
    {
        $display .= "<tr>";
        
        //If the current flight ID is different from the previous one
        if ($line['ID'] != $save_ID)
        {
            $save_ID = $line['ID'];
            $save_line[0] = $line;

            foreach ($line as $col_value)
            {
                $display .= "<td>" . $col_value . "</td>";
            }

            $display .= "<td>";
            $display .= "<form method='post' action='index.php'>";
            $display .= "<input type='hidden' name='page' value='controller_displaydatabd'/>";
            $display .= "<input type='hidden' name='VolID' value='".$line['ID']."'/>";
            $display .= "<input type='submit' class='btn btn-primary  btn-sm' value='Modifier'/>";
            $display .= "</form>";
            $display .= "</td>";

            $display .= "<td>";
            $display .= "<form method='post' action='index.php'>";
            $display .= "<input type='hidden' name='page' value='controller_suppdatadb'/>";
            $display .= "<input type='hidden' name='VolID' value='".$line['ID']."'/>";
            $display .= "<input type='submit' class='btn btn-primary  btn-sm' value='Supprimer'/>";
            $display .= "</form>";
            $display .= "</td>";

            $display .= "</tr>";
        }
        else 
        {
            foreach($line as $col_value)
            {                
                if ($col_value != $line['Age'] && in_array($col_value, $save_line[0]))
                {
                    $display .= "<td>" . "</td>";
                }
                //We show that Lastname, firstname and age 
                else
                {
                    $display .= "<td>" . $col_value . "</td>";
                }
            }            
            $display .= "</tr>";            
        }       
        
    }
    $display .= "</table>";

    $conn->close();

    include './templates/displaydb.php';

?>