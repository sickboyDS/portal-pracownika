<?php
    require_once("../db/connection.php");

    function validate($data){
        $data = trim($data); // removes whitespace or any other predefined character from both the left and right sides of a string.
        $data = stripslashes($data); //removes backslashes
        $data = htmlspecialchars($data); //converts some predefined characters to HTML entities
        return $data;
    }

    $userid = validate($_POST['userid']);
    $login = validate($_POST['login']);
    $haslo = validate($_POST['haslo']);
    $email = validate($_POST['email']);
    $imie = validate($_POST['imie']);
    $nazwisko = validate($_POST['nazwisko']);
    $adres = validate($_POST['adres']);
    $numerkonta = validate($_POST['numerkonta']);
    $perm = validate($_POST['perm']);
    $aa = validate($_POST['user_aa']);

    if (empty($login) || empty($email) || empty($imie) || empty($nazwisko) || empty($adres)|| empty($numerkonta)|| empty($perm)|| empty($aa)) {
        echo "WYPEŁNIJ WSZYSTKIE POLA!";
    }else{

        $sql = "UPDATE users SET user_login='$login', user_email='$email', usr_name='$imie', user_surname='$nazwisko', user_addr='$adres', user_acn='$numerkonta', user_perm='$perm', user_aa='$aa' WHERE user_id='$userid'";  
        
        if(mysqli_query($conn, $sql)){
            echo "Zmodyfikowano użytkownika";
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
        header("Location: ../pages/user_list.php");
        exit();
    }
?>