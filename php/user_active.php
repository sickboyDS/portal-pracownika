<?php
    require_once("../db/connection.php");

    $userid = $_POST['userid'];

    $sql = "UPDATE users SET user_aa=1 WHERE user_id='$userid'";  
    
    if(mysqli_query($conn, $sql)){
        echo "Użytkownik aktywowany!";
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
    header("Location: ../pages/user_list.php");
    exit();

?>