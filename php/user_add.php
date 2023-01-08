<?php
    session_start();
    //echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

        //Udana walidacja
        $validate = true;

        //Sprawdzenie loginu
        $login = $_POST['login'];

        if((strlen($login)<3) || (strlen($login)>20))
        {
            $validate = false;
            $_SESSION['e_login'] = "Nazwa użytkownika musi posiadać od 3 do 20 znaków";
        }

        //Sprawdzenie maila
        $email = $_POST['email'];
        $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

        if((filter_var($emailB, FILTER_SANITIZE_EMAIL)==false) || ($emailB!=$email))
        {
            $validate = false;
            $_SESSION['e_email'] = "Podaj poprawny adres email";
        }

        //Poprawność hasła
        $pass = $_POST['password'];

        if((strlen($pass)<8) || (strlen($pass)>20))
        {
            $validate = false;
            $_SESSION['e_pass'] = "Haslo musi posiadać od 8 do 20 znakow";
        }

        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);

        //Poprawność imienia
        $name = $_POST['name'];
        $check_name = '/(*UTF8)^[A-ZŁŚŻ]{1}+[a-ząęółśżźćń]/';

        if(!preg_match($check_name,$name))
        {  
            $validate = false;
            $_SESSION['e_name'] = "Imię musi zaczynać się z wielkiej litery i może zawierać wyłącznie litery";
        }    

        //Poprawność nazwiska
        $surname = $_POST['surname'];
        $check_surname = '/(*UTF8)^[A-ZŁŚŻ]{1}/';

        if(!preg_match($check_surname, $surname))
        {  
            $validate = false;
            $_SESSION['e_surname'] = "Nazwisko musi zaczynać się z wielkiej litery i nie może zawierać cyfr";
        }

        //Poprawność adresu
        $adress = $_POST['adress'];
        $check_adress = '/(*UTF8)^[A-ZŁŚŻ]/';

        if(!preg_match($check_adress, $adress))
        {  
            $validate = false;
            $_SESSION['e_adress'] = "Adres musi zaczynać się z wielkiej litery";
        }

        //Poprawność numeru konta
        $acn = $_POST['acn'];
        $check_acn = '/^[0-9]{26}$/';

        if(!preg_match($check_acn, $acn))
        {  
            $validate = false;
            $_SESSION['e_acn'] = "Niepoprawny numer konta";
        }
        
        $perm = $_POST['perm'];

        if($validate == false){
            header("Location: ../pages/user_add_form.php");  
        }

        try
        {
            require_once("../db/connection.php");
            if($conn->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            else{

                //Istnienie maila w bazie
                $result = $conn->query("SELECT user_id FROM users WHERE user_email='$email'");
                if(!$result) throw new Exception($conn->error);
                $count_mailes = $result->num_rows;
                if($count_mailes>0)
                {
                    $validate = false;
                    $_SESSION['e_email'] = "Istnieje juz konto przypisane do tego adresu email";
                }

                //Istnienie loginu w bazie
                $result = $conn->query("SELECT user_id FROM users WHERE user_login='$login'");
                if(!$result) throw new Exception($conn->error);
                $count_login = $result->num_rows;
                if($count_login>0)
                {
                    $validate = false;
                    $_SESSION['e_login'] = "Istnieje juz konto z takim loginem";
                }

                if($validate==true)
                {
                   if($conn->query("INSERT INTO users VALUES (NULL, '$login', '$pass_hash', '$email',  '$name', '$surname', '$adress', '$acn', '$perm', '1')"))
                   {
                    $_SESSION['info'] = "Konto zostało założone.";
                    header("Location: ../pages/user_add_form.php");  
                   }
                   else{
                    throw new Exception($conn->error);
                   }
                   $conn->close();
                }else{
                    header("Location: ../pages/user_add_form.php"); 
                }
            }
        }
        catch(Exception $e)
        {
            echo "Błąd serwera";
            echo "<br />".$e;
        }
?>