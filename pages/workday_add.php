<?php 
     session_start();

     if ($_SESSION['zalogowany']==true AND $_SESSION['user_aa']==1){
    //  print_r($_SESSION);

    require_once("../db/connection.php");
    require_once("../php/header.php");

     $sqlQue = "SELECT user_id, usr_name, user_surname, user_perm FROM users";
     $query = mysqli_query($conn, $sqlQue);

 
?>

<section class="vh-90 gradient-custom">
     <div class="container py-5 h-100">
          <div class="col-12">
          <?php
            echo "<form method='post' action=''>";
            ?>
                 <div class="input-group mb-2">
                    <span class="input-group-text">Wybierz pracownika</span>
                    <?php
                        echo "<select name='worker'>";
                        foreach($query as $value)
                        {
                            echo "<option value=".$value['user_id']."> ".$value['usr_name']."&nbsp;".$value['user_surname']."</option>";
                        }
                        echo "</select>";
                    ?>
                </div>

                <div class="input-group mb-2">
                    <span class="input-group-text">Dodaj ilość przepracowanych godzin</span>
                    <input type="number" min='1' max='12' class="form-control" name="hours" required>
                </div>

                <div class="input-group mb-2">
                    <span class="input-group-text">Dodaj datę</span>
                    <input type="date" min="2022-01-01" max='2099-12-31' class="form-control" name="date" required>
                </div>

                <div class="input-group mb-2">
                    <span class="input-group-text">Dodaj komentarz</span>
                    <input type="text" class="form-control" name="comment">
                </div>
            
            <?php
                echo "<a class='btn btn-primary' href='work.php' role='button'>Wróć</a>";
                echo "<input class='btn btn-primary mx-2' type='submit' value='Wyślij'>";
                echo "</form>";

                

            if(!empty($_POST))
            {
                $worker = $_POST['worker'];
                $hours = $_POST['hours'];
                $date = $_POST['date'];
                $comment = $_POST['comment'];
                
                if($conn->query("INSERT INTO `work` VALUES (NULL, '$worker', '$date', '$hours', '$comment')"))
                {
                 echo "Pomyślnie dodano dzień pracy";
                
                }else{
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
            ?>
        </div>  
    </div>
</section>

<?php 
require_once("../php/header.php");
    }else{
        header("Location: ../index.php");
        exit();
    }
?>