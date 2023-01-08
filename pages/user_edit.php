<?php 
     session_start();
     if ($_SESSION['zalogowany']==true AND $_SESSION['user_aa']==1){
    require_once("../php/header.php");
?>

<section class="vh-90 gradient-custom">
     <div class="container py-5 h-100">
          <div class="col-12">

          <?php
                require_once("../db/connection.php");
                
                $userid = $_POST['userid'];

                $sqlSelect = "SELECT * FROM users WHERE user_id='$userid'";
                $resultSelect = mysqli_query($conn, $sqlSelect); 

                if($_SESSION['user_perm']!='3'){
                    
                    if($resultSelect->num_rows > 0){
                        while($row = mysqli_fetch_array($resultSelect)){
                            echo "<form action='../php/user_update.php' method='post'>";
                            echo "<input type='hidden' class='form-control' name='userid' value='{$row['user_id']}'>";
                            echo "<div class='input-group mb-2'><span class='input-group-text'>Login</span><input type='text' class='form-control' name='login' value='{$row['user_login']}'></div>";
                            echo "<input type='hidden' class='form-control' name='haslo' value='{$row['user_pass']}'>";
                            echo "<div class='input-group mb-2'><span class='input-group-text'>Email</span><input type='email' class='form-control' name='email'value='{$row['user_email']}'></div>";
                            echo "<div class='input-group mb-2'><span class='input-group-text'>Imię</span><input type='text' class='form-control' name='imie'value='{$row['usr_name']}'></div>";
                            echo "<div class='input-group mb-2'><span class='input-group-text'>Nazwisko</span><input type='text' class='form-control' name='nazwisko' value='{$row['user_surname']}'></div>";
                            echo "<div class='input-group mb-2'><span class='input-group-text'>Adres</span><input type='text' class='form-control' name='adres' value='{$row['user_addr']}'></div>";
                            echo "<div class='input-group mb-2'><span class='input-group-text'>Numer konta</span><input type='text' class='form-control' name='numerkonta' value='{$row['user_acn']}'></div>";
                            echo "<input type='hidden' class='form-control' name='perm' value='{$row['user_perm']}'>";
                            echo "<input type='hidden' class='form-control' name='user_aa' value='{$row['user_aa']}'>";
                            echo "<a class='btn btn-primary mt-3' href='user_list.php' role='button'>Wróć</a>";
                            echo "<button type='submit' class='btn btn-primary mt-3 mx-2'>Zatwierdź</button>";
                            echo "</form>";
                        }
                        mysqli_close($conn); 
                    }
                }else{
                    if($resultSelect->num_rows > 0){
                        while($row = mysqli_fetch_array($resultSelect)){
                            echo "<form action='../php/user_update.php' method='post'>";
                            echo "<input type='hidden' class='form-control' name='userid' value='{$row['user_id']}'>";
                            echo "<div class='input-group mb-2'><span class='input-group-text'>Login</span><input type='text' class='form-control' name='login' value='{$row['user_login']}'></div>";
                            echo "<div class='input-group mb-2'><span class='input-group-text'>Hasło</span><input type='password' class='form-control' name='haslo' value='{$row['user_pass']}'></div>";
                            echo "<div class='input-group mb-2'><span class='input-group-text'>Email</span><input type='email' class='form-control' name='email'value='{$row['user_email']}'></div>";
                            echo "<div class='input-group mb-2'><span class='input-group-text'>Imię</span><input type='text' class='form-control' name='imie'value='{$row['usr_name']}'></div>";
                            echo "<div class='input-group mb-2'><span class='input-group-text'>Nazwisko</span><input type='text' class='form-control' name='nazwisko' value='{$row['user_surname']}'></div>";
                            echo "<div class='input-group mb-2'><span class='input-group-text'>Adres</span><input type='text' class='form-control' name='adres' value='{$row['user_addr']}'></div>";
                            echo "<div class='input-group mb-2'><span class='input-group-text'>Numer konta</span><input type='text' class='form-control' name='numerkonta' value='{$row['user_acn']}'></div>";
                            echo "<div class='input-group mb-2'><span class='input-group-text'>Uprawnienia</span><input type='text' class='form-control' name='perm' value='{$row['user_perm']}'></div>";
                            echo "<div class='input-group mb-2'><span class='input-group-text'>Aktywność</span><input type='text' class='form-control' name='user_aa' value='{$row['user_aa']}'></div>";
                            echo "<a class='btn btn-primary mt-3' href='user_list.php' role='button'>Wróć</a>";
                            echo "<button type='submit' class='btn btn-primary mt-3 mx-2'>Zatwierdź</button>";
                            echo "</form>";
                        }
                        mysqli_close($conn); 
                    }
                }


            ?>
        </div>  
    </div>
</section>

<?php 
require_once("../php/footer.php");
    }else{

        header("Location: ../index.php");
        exit();
    }
?>