<?php
  $titulok = "Zmena hesla";
  include_once "html_hlavicka.php";
  session_start();
  $Meno_prihlasenia= $_SESSION['Meno'];
  $prihlasenie = $_SESSION['prihlasenie'];
  $Skola = $_SESSION['skola'];
  if($prihlasenie != "uzivatel"){
    echo '<script type="text/JavaScript">window.open("index.php", "_self"); </script>';
  }
?>

      <img class="small" src="nazov.png" width="70%" height="300%" align="center" border="0" alt="Spoznaj univerzitu">
      <img class="big" src="nazov.png" width="35%" height="150 px" align="center" border="0" alt="Spoznaj univerzitu">

      <div>
      <h2 class="heading">Tu môžeš zmeniť svoje staré heslo na nové</h2>

 <form action="zmena_hesla.php" method="post" class="login-form">
    <div>
      <p>Nové heslo:</p>
      <input type="password" name="heslo_nove">
      <p>Opakuj nové heslo:</p>
      <input type="password" name="heslo_opakuj">

      <p><input type="submit" name="zmena" value="Zmeň heslo"></p>
    </div>
    </form>
      <a href="hlavna.php" class="btn">Návrat do menu</a>
  </div>

<?php

    if (isset($_POST['zmena'])){
          $nove_heslo = $_POST['heslo_nove'];
          $opakuj_heslo = $_POST['heslo_opakuj'];
          if(($nove_heslo !='')){
               if ($nove_heslo==$opakuj_heslo){
                          $db_spojenie = mysqli_connect('127.0.0.1', 'root','','db_kviz','3306');
                            if ($db_spojenie){
                                       mysqli_query($db_spojenie,"SET NAMES 'utf8'");
                                       $objekt_vysledkov = mysqli_query($db_spojenie, "UPDATE $Skola SET Heslo = '$nove_heslo' WHERE Meno = '$Meno_prihlasenia';");
                                       echo "<script type='text/javascript'>alert('Heslo úspešne zmenené');</script>";
                                       echo '<script type="text/JavaScript">window.open("hlavna.php", "_self"); </script>';
                            }
                            else{
                                echo 'Spojenie s databázou neúspešné';
                                echo 'Vzniknutá chyba: ' . mysqli_connect_error();
                            }
                            if ($db_spojenie) mysqli_close($db_spojenie);
                 }
                 else {
                     echo "<script type='text/javascript'>alert('Heslá sa nezhodujú! Opakuj Zmenu hesla ešte raz!');</script>";
                 }
          }
    }
?>

<?php
  include_once "html_pata.php";
?>
