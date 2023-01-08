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

                    $sqlWork = "SELECT u.usr_name, u.user_surname, w.work_id, w.data, w.czas, w.komentarz FROM users u, work w WHERE u.user_id = w.user_id";    
                    $wynik = mysqli_query($conn, $sqlWork);
    
                    if($wynik->num_rows > 0){

                        echo '<table class="table table-striped table-bordered"><tr><th>#</th><th>Imie</th><th>Nazwisko</th><th>Data</th><th>Czas pracy</th><th>Komentarz</th><th>Dodaj komentarz</th></tr><tbody class="table-group-divider">';
                        while($row = mysqli_fetch_array($wynik)){
                            echo "<tr><td>{$row['work_id']}</td><td>{$row['usr_name']}</td><td>{$row['user_surname']}</td><td>{$row['data']}</td><td>{$row['czas']}</td><td>{$row['komentarz']}</td>
                            <td>
                            <form action='comment_add.php' method='post'>
                                <input type='hidden' name='workid' value='{$row['work_id']}'>
                                <button type='submit' class='btn btn-link p-0'>Dodaj</button>
                            </form>
                            </td>
                            </tr>";
                        }
                        echo '</table>';
                    }else {
                        echo "brak wyników";
                    }
                    mysqli_close($conn);
                   
                ?>
               <a class="btn btn-primary" href="main.php" role="button">Wróć</a>
               <a class='btn btn-primary' href='workday_add.php' role='button'>Dodaj</a>
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