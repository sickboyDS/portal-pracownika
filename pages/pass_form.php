<?php 
    session_start();
    if ($_SESSION['zalogowany']==true AND $_SESSION['user_aa']==1){
    require_once("../php/header.php");
?>

    <section class="vh-90 gradient-custom">
        <div class="container col-3 py-5 h-100">
            
            <form action="../php/pass_switch.php" method="post">

                <div class="input-group mb-2">
                    <span class="input-group-text">Stare hasło</span>
                    <input type="password" class="form-control" name="stare-haslo">
                </div>

                <div class="input-group mb-2">
                    <span class="input-group-text">Nowe hasło</span>
                    <input type="password" class="form-control" name="nowe-haslo">
                </div>
                <div class="row align-content-between">
                        <div class="col">
                            <a class="btn btn-primary" href="main.php" role="button">Wróć</a>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Zmień hasło</button>
                        </div>
                    </div>
                
                
            </form>
            
        </div>
    </section>

<?php 
require_once("../php/footer.php");

    }else{
        header("Location: ../index.php");
        exit();
    }
?>