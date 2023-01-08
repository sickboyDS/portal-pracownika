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
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Portal 2.0</title>
</head>
<body class="bg-light">
    
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                <h1 class="col mb-4 p-0">Portal Pracownika</h1>

                <form action="php/login.php" method="post">
                    <div class="form-outline mb-4">
                        <input type="text" class="form-control" name="login" required>
                        <label class="form-label">Login</label>
                    </div>

                    <div class="form-outline mb-4">
                        <input type="password" class="form-control" name="password" required>
                        <label class="form-label">Hasło</label>
                    </div>

                    <div class="row align-content-between">
                        <div class="col">
                            <a class="btn btn-primary" href="pages/registration.php">Załóż konto</a>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Zaloguj</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </section>
    <?php
        if(isset($_SESSION['error']))
        {
            echo '<div class="error">'.$_SESSION['error'].'</div>';
            unset($_SESSION['error']);
        }
    ?>
</body>
</html>