<?php 
    session_start();
    if (isset($_SESSION['zalogowany']))
    {
        header("Location: pages/main.php");
    }

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Portal 2.0</title>
</head>
<body class="bg-light">
<section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                <h1 class="col-12 mb-4">Rejestracja</h1>
                    <form action="../php/register.php" method="post">

                    <div class="form-outline">
                        <input type="text" class="form-control" name="login"  required>
                        <label class="form-label">Login</label>
                        <?php  if(isset($_SESSION['e_login'])){echo '<div class="error">'.$_SESSION['e_login'].'</div>';unset($_SESSION['e_login']);} ?>
                    </div>
                    <div class="form-outline">
                        <input type="password" class="form-control" name="password" required> 
                        <label class="form-label">Hasło</label>
                        <?php if(isset($_SESSION['e_pass'])){echo '<div class="error">'.$_SESSION['e_pass'].'</div>';unset($_SESSION['e_pass']);} ?>
                    </div>
                    <div class="form-outline">
                        <input type="email" class="form-control"  name="email" required> 
                        <label class="form-label">E-mail</label>
                        <?php if(isset($_SESSION['e_email'])){echo '<div class="error">'.$_SESSION['e_email'].'</div>';unset($_SESSION['e_email']);} ?>
                    </div>
                    <div class="form-outline">
                        <input type="text" class="form-control" name="name" required>
                        <label class="form-label">Imię</label>
                        <?php  if(isset($_SESSION['e_name'])){echo '<div class="error">'.$_SESSION['e_name'].'</div>';unset($_SESSION['e_name']);} ?>
                    </div>
                    <div class="form-outline">
                        <input type="text" class="form-control" name="surname" required> 
                        <label class="form-label">Nazwisko</label>
                        <?php if(isset($_SESSION['e_surname'])){echo '<div class="error">'.$_SESSION['e_surname'].'</div>';unset($_SESSION['e_surname']);} ?>
                    </div>
                    <div class="form-outline">
                        <input type="text" class="form-control" name="adress" required> 
                        <label class="form-label">Adres</label>
                        <?php if(isset($_SESSION['e_adress'])){echo '<div class="error">'.$_SESSION['e_adress'].'</div>';unset($_SESSION['e_adress']);} ?>
                    </div>
                    <div class="form-outline">
                        <input type="number" class="form-control" name="acn" required>
                        <label class="form-label">Numer konta</label>
                        <?php if(isset($_SESSION['e_acn'])){echo '<div class="error">'.$_SESSION['e_acn'].'</div>';unset($_SESSION['e_acn']);} ?>
                    </div>
                    <div class="row align-content-between">
                        <div class="col">
                            <a class="btn btn-primary" href="../index.php">Wróć</a>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Załóż konto</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

    <?php
        if(isset($_SESSION['info'])){echo '<div class="info">'.$_SESSION['info'].'</div>';unset($_SESSION['info']);}
    ?>
    
    </body>
</html>