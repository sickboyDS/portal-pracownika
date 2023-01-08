<?php
    require_once("../db/connection.php");

    $userid = $_POST['userid'];
    
        $userDrop = "DELETE FROM users WHERE user_id = $userid";

        if($conn->query($userDrop)){
            echo "Usunięto użytkownika";
        }else{
            echo "Error: ". mysqli_error($conn);
        }

        mysqli_close($conn);

        header("Location: ../pages/user_list.php");
        exit();
    
?>