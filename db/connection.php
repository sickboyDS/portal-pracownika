<?php
        $db_serv = "localhost";
        $db_user = "root";
        $db_pass = "";
        $db_name = "portal2";
        
        $conn = mysqli_connect($db_serv, $db_user, $db_pass, $db_name);

        if ($conn->connect_errno!=0)
        {
            echo "Error: ".$conn->connect_errno." Opis: ".$conn->connect_error;
        }
        return $conn;
?>