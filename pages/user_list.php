<?php 
     session_start();

     if ($_SESSION['zalogowany']==true AND $_SESSION['user_aa']==1){
     require_once("../php/header.php");

               require_once("../db/connection.php");

               $listaUzytkownikow = "SELECT * FROM users";    
               $wynik = mysqli_query($conn, $listaUzytkownikow);

                    if($wynik->num_rows > 0){
                         echo '<table class="table table-striped table-bordered"><tr><th>#</th><th>Login</th><th>Imie</th><th>Nazwisko</th><th>Adres</th><th>Nr konta</th><th>Uprawnienia</th><th>Usuń</th><th>Zmień</th><th>Aktywność</th></tr><tbody class="table-group-divider">';
                         while($row = mysqli_fetch_array($wynik)){
                              echo "<tr><td>{$row['user_id']}</td><td>{$row['user_login']}</td><td>{$row['usr_name']}</td><td>{$row['user_surname']}</td><td>{$row['user_addr']}</td><td>{$row['user_acn']}</td><td>{$row['user_perm']}</td>
                                   <td> 
                                   <form action='../php/user_drop.php' method='post'>
                                   <input type='hidden' name='userid' value='{$row['user_id']}'>
                                   <button type='submit' class='btn btn-link py-0'>Usuń</button>
                                   </form>
                                   </td>
                                   <td>
                                   <form action='user_edit.php' method='post'>
                                   <input type='hidden' name='userid' value='{$row['user_id']}'>
                                   <button type='submit' class='btn btn-link py-0'>Edytuj</button>
                                   </form>
                                   </td>";
                                   echo "<td>";
                                   if ($row['user_aa']==1){
                                        echo "Aktywny";
                                   }else{
                                        echo"<form action='../php/user_active.php' method='post'>
                                        <input type='hidden' name='userid' value='{$row['user_id']}'>
                                        <button type='submit' class='btn btn-link py-0'>Aktywuj</button>
                                        </form>";
                                   }
                                   echo "</td></tr>";
                              }
                              echo '</table>';
                         }else {
                              echo "brak wyników";
                         }
                         mysqli_close($conn);
               ?>
               <a class="btn btn-primary" href="main.php" role="button">Wróć</a>
               <a class="btn btn-primary" href="user_add_form.php" role="button">Dodawanie użytkownika</a>
          
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