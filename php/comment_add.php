<?php
    require_once("../db/connection.php");

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data); 
        $data = htmlspecialchars($data); 
        return $data;
    }

    $comm = validate($_POST['comm']);
    $workid = validate($_POST['workid']);


    
        $sql = "UPDATE work SET komentarz='$comm' WHERE work_id='$workid'";  
        
        if(mysqli_query($conn, $sql)){
            echo "Dodano nowy komentarz";
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
        header("Location: ../pages/main.php");
        exit();

?>

