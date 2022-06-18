 <?php
  $titulok = "Registrácia";
  include_once "html_hlavicka.php";

?>

  <img class="small" src="nazov.png" width="70%" height="300%" align="center" border="0" alt="Spoznaj univerzitu">
  <img class="big" src="nazov.png" width="35%" height="150 px" align="center" border="0" alt="Spoznaj univerzitu">
 <div>

    <h2 class="heading">Vyplň registračný formulár</h2>

    <form action="registracia.php" method="post" class="reg-form">
        <div>
          <p>Meno/nick:</p> <input type="text" name="Meno">
          <p>Email:</p> <input type="email" id="email" name="Email">
          <p>Heslo:</p> <input type="password" name="Heslo">
          <p>Opakuj heslo:</p> <input type="password" name="Heslo_opakuj">
          <p>Na akej škole aktuálne študuješ?:</p>
          <p><input type="radio" name="skola" value="uzivatelia_ss" checked> stredná škola/gymnázium</p>
          <p><input type="radio" name="skola" value="uzivatelia_vs">vysoká škola</p>
          <p><input type="checkbox" name="gdpr" value="gdpr">Súhlasím so spracovaním osobných údajov podľa <a target="_blank" href="https://www.epi.sk/zz/2018-158">GDPR</a></p>
        </div>
     <input type="submit" name="registracia" class="button" value="Registrovať">
    </form>


    <a href="index.php" class="btn">Domov</a>

</div>
 <?php
     if (isset($_POST['registracia'])){
       if(isset($_POST['gdpr'])){
         $meno_form = $_POST['Meno'];
         $email_form = $_POST['Email'];
         $heslo = $_POST['Heslo'];
         $Skola = $_POST['skola'];
         $o_heslo = $_POST['Heslo_opakuj'];

         if(($meno_form !='') AND ($heslo !='') AND ($email_form !='')){
          if ($heslo == $o_heslo)
           {
            $db_spojenie = mysqli_connect('127.0.0.1', 'root','','db_kviz','3306');

             if ($db_spojenie){
                      mysqli_query($db_spojenie,"SET NAMES 'utf8'");
                      $objekt_vysledkov = mysqli_query($db_spojenie, "SELECT * FROM uzivatelia_vs WHERE Meno='$meno_form'");
                      $riadok = mysqli_fetch_array($objekt_vysledkov);
                      $objekt_vysledkov2 = mysqli_query($db_spojenie, "SELECT * FROM uzivatelia_ss WHERE Meno='$meno_form'");
                      $riadok2 = mysqli_fetch_array($objekt_vysledkov2);

                      $objekt_mailov = mysqli_query($db_spojenie, "SELECT * FROM uzivatelia_vs WHERE Email='$email_form'");
                      $riadok3 = mysqli_fetch_array($objekt_mailov);
                      $objekt_mailov2 = mysqli_query($db_spojenie, "SELECT * FROM uzivatelia_ss WHERE Email='$email_form'");
                      $riadok4 = mysqli_fetch_array($objekt_mailov2);



                      if(($meno_form == $riadok['Meno']) || ($meno_form == $riadok2['Meno'])){
                        echo "<script type='text/javascript'>alert('Účet s týmto menom už existuje!');</script>";
                      }

                      else{
                           if(($email_form == $riadok3['Email']) || ($email_form == $riadok4['Email'])){
                              echo "<script type='text/javascript'>alert('Účet s touto e-mailovou adresou už existuje!');</script>";
                           }
                            else{
                                $posli_data = mysqli_query($db_spojenie, "INSERT INTO $Skola (Meno, Email, Heslo) VALUES ('$meno_form', '$email_form', '$heslo')");
                                if (!$posli_data) die ('Chyba v príkaze SQL: ' . mysqli_error($db_spojenie));
                                $message = "Ahoj $meno_form gratulujem k úspešnej registrácií, môžeš sa prihlásiť";
                                echo "<script type='text/javascript'>alert('$message');</script>";
                                echo '<script type="text/JavaScript">window.open("prihlasenie.php", "_self"); </script>';
                                mysqli_free_result ($objekt_vysledkov);
                            }
                      }
                 }

             else{
                  echo 'spojenie neúspešné';
                  echo 'Vzniknutá chyba: ' . mysqli_connect_error();
                 }
                if ($db_spojenie) mysqli_close($db_spojenie);
            }
          else echo "<script type='text/javascript'>alert('Heslá sa nezhodujú');</script>";
          }
          else{
              echo "<script type='text/javascript'>alert('Nevyplnil si všetky polia!');</script>";
              echo '<script type="text/JavaScript">window.open("registracia.php", "_self"); </script>';
            }
         }
        else{
          echo "<script type='text/javascript'>alert('Bez súhlasu so spracovaním údajov nie je možné zaregistrovať sa!');</script>";
        }
      }
 ?>

<?php
  include_once "html_pata.php";
?>
