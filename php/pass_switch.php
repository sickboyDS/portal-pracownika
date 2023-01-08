<?php
    session_start();

    if ($_SESSION['zalogowany']==true AND $_SESSION['user_aa']==1){ 
        require_once("../db/connection.php");

        $stare = $_POST['stare-haslo'];
        $nowe = $_POST['nowe-haslo'];

        if (empty($stare) || empty($nowe)) {
            header("Location: ../pages/pass_form.php");
            exit();
            
        }else{

                $id = $_SESSION['user_id'];
                $nowe_hash = password_hash($nowe, PASSWORD_DEFAULT);

                // $sqlStare = "SELECT user_pass FROM users WHERE user_id='$id' AND user_pass='$stare'"; 
                // if($stare==$sqlStare){
                //     echo"hasła są takie same";
                // }else{
                //     echo"hasła nie są takie same";
                // }

            }
    
    }else{

    header("Location: ../index.php");
    exit();
}

?>