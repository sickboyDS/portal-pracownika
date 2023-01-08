<?php 
    session_start();
    if ($_SESSION['zalogowany']==true AND $_SESSION['user_aa']==1){
    require_once("../php/header.php");
?>

<section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                    <form action="../php/user_add.php" method="post">

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
                    <div class="form-outline">
                        <input type="text" class="form-control" name="perm" required>
                        <label class="form-label">Uprawnienia</label>
                        <?php if(isset($_SESSION['e_aa'])){echo '<div class="error">'.$_SESSION['e_aa'].'</div>';unset($_SESSION['e_aa']);} ?>
                    </div>
                    <div class="row align-content-between">
                        <div class="col">
                            <a class="btn btn-primary" href="user_list.php" role="button">Wróć</a>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Dodaj użytkownika</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
    require_once("../php/footer.php");
    
    if(isset($_SESSION['info'])){echo '<div class="info">'.$_SESSION['info'].'</div>';unset($_SESSION['info']);}
    }else{
        header("Location: ../index.php");
        exit();
    }
?>