<?php 
     session_start();
     if ($_SESSION['zalogowany']==true AND $_SESSION['user_aa']==1){
          
     require_once("../php/header.php");
?>

<section class="vh-90 gradient-custom">
     <div class="container col-12 my-5 h-100">

     <a class='btn btn-primary' href='my_work.php' role='button'>Godziny pracy</a>
     

     <?php if($_SESSION['user_perm']=='2'){
               echo "<a class='btn btn-primary' href='work.php' role='button'>Karty pracy</a>";
          }
     ?>

    <?php if($_SESSION['user_perm']=='3'){
               echo "<a class='btn btn-primary' href='user_list.php' role='button'> Lista użytkowników</a>";
          }
     ?>

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
 ?>