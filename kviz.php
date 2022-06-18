<?php
  $titulok = "Kvíz";
  include_once "html_hlavicka.php";
  session_start();
  $Meno_prihlasenia= $_SESSION['Meno'];
  $Skola = $_SESSION['skola'];
  $qr_code = $_COOKIE['code'];

  $prihlasenie = $_SESSION['prihlasenie'];
  if($prihlasenie != "uzivatel"){
    echo '<script type="text/JavaScript">window.open("index.php", "_self"); </script>';
  }
?>

      <img class="small" src="nazov.png" width="70%" height="300%" align="center" border="0" alt="Spoznaj univerzitu">
      <img class="big" src="nazov.png" width="35%" height="150 px" align="center" border="0" alt="Spoznaj univerzitu">

  <div class="kviz">

      <h2 class="heading">Odpovedz na nasledujúcu otázku:</h2>

      <?php

            $db_spojenie = mysqli_connect('127.0.0.1', 'root','','db_kviz','3306');

            if ($db_spojenie)
                  {
                     mysqli_query($db_spojenie,"SET NAMES 'utf8'");
                     $objekt_vysledkov = mysqli_query($db_spojenie, "SELECT * FROM otazky WHERE Kod ='$qr_code'");
                     $otazka = mysqli_fetch_array($objekt_vysledkov);
                     $posli_data = mysqli_query($db_spojenie, "INSERT INTO obmedzenie (Meno, Pouzite, Skola) VALUES ('$Meno_prihlasenia', '$qr_code', '$Skola')");
                     echo "<p>" . $otazka['Znenie'] . "</p>";
                     $spravna = $otazka['Spravna'];
                     $_SESSION['spravna'] = $spravna;
                   }
            else{
                   echo 'Spojenie s databázou neúspešné';
                   echo 'Vzniknutá chyba: ' . mysqli_connect_error();
                }

     ?>

  <form action="vyhodnotenie.php" method="post" class="login-form">
    <div>
      <p>Odpoveď</p>
      <input type="text" name="odpoved_uzivatela">
      <p><input type="submit" name="odpoved" class="button odsadenie" value="Potvrdiť odpoveď"></p>
      <input type="hidden" name="spravna" value="<?php echo $spravna?>">
    </div>

  </form>
    <a href="hlavna.php" class="btn">Neviem odpovedať</a>
  </div>

<?php
  include_once "html_pata.php";
?>
