<?php 
     session_start();
     if ($_SESSION['zalogowany']==true AND $_SESSION['user_aa']==1){
          
     require_once("../php/header.php");
?>

<section class="vh-90 gradient-custom">
        <div class="container col-3 py-5 h-100">
               
                <?php
                require_once("../db/connection.php");
                
                $workid = $_POST['workid'];
               
                $sqlSelect = "SELECT komentarz FROM work WHERE work_id='$workid'";
                $resultSelect = mysqli_query($conn, $sqlSelect); 

                ?>

                <div class="mb-3">
                    <form action="../php/comment_add.php" method="post">
                        <label class="form-label">Komentarz:</label>
                        <textarea class="form-control mb-3" name="comm"><?php  if($resultSelect->num_rows > 0){
                            while($row = mysqli_fetch_array($resultSelect)){echo "{$row['komentarz']}";}
                            }
                            mysqli_close($conn); 
                        ?>
                        </textarea>
                        <input type='hidden' name='workid' value='<?php echo $workid ?>'>
                        <a class="btn btn-primary" href="my_work.php" role="button">Wróć</a>
                        <button type="submit" class="btn btn-primary">Dodaj</button>
                    </form>
                </div>

          </div>
</section>

<?php 
     require_once("../php/footer.php");
}else{
     session_unset();
     $_SESSION['zalogowany'] = false;
     session_destroy();
     header("Location: ../index.php");
     exit();
}