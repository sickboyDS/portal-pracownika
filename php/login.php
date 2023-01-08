<?php
    session_start();
    require_once("../db/connection.php");
    echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

    if (isset($_POST['login'], $_POST['password'])) 
    {
        $login = $_POST['login'];
        $login = htmlentities($login, ENT_QUOTES, "UTF-8");
        $pass = $_POST['password'];

        if ($result = $conn->query("SELECT * FROM users WHERE user_login='$login'"))
        {
       
            $ile = $result->num_rows;
        
            if($ile>0)
            {
                $row = $result->fetch_assoc();
                $sql = $conn->query("SELECT user_id, user_pass FROM users");
                if(password_verify($pass, $row['user_pass']))
                    {
                        $_SESSION['zalogowany'] = true;
                        $_SESSION['usr_name'] = $row['usr_name'];
                        $_SESSION['user_surname'] = $row['user_surname'];
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['user_perm'] = $row['user_perm'];
                        $_SESSION['user_aa'] = $row['user_aa'];

                        header("Location: ../pages/main.php");
                        exit();
                    }
                    else
                    {
                        $_SESSION['error'] = "Nieprawidłowe hasło!";
                        header("Location: ../index.php");  
                    }
            }
            else
            {
                $_SESSION['error'] = "Nieprawidłowy login!";
                header("Location: ../index.php");  
            }  
        }
    }
    else
    {   
        // echo "ALARM!!";
        header("Location: ../index.php");
        exit();
    }