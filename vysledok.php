<?php
  $titulok = "Vyhodnotenie";
  include_once "html_hlavicka.php";
  session_start();
  $Meno= $_SESSION['Meno'];
  $Skola= $_SESSION['skola'];
  $Spravnaodpoved = $_SESSION['spravnaodpoved'];
  $prihlasenie = $_SESSION['prihlasenie'];
  if($prihlasenie != "uzivatel"){
    echo '<script type="text/JavaScript">window.open("index.php", "_self"); </script>';
  }
?>
      <img class="small" src="nazov.png" width="70%" height="300%" align="center" border="0" alt="Spoznaj univerzitu">
      <img class="big" src="nazov.png" width="35%" height="150 px" align="center" border="0" alt="Spoznaj univerzitu">
      <div id="obsah">

      <h1 class="heading">
          <?php  
              if($Spravnaodpoved == "spravnaodpoved"){
                    echo "Správna odpoveď!";
              }
              else{
              echo "Nesprávna odpoveď!";
              }
          ?>
       </h1>

      <?php
         if($Spravnaodpoved == 'spravnaodpoved'){
             echo "<p>$Meno, odpovedal/a si správne!</p>";
         }
         else{
            echo "<p>$Meno, odpovedal/a si nesprávne!</p>";
         }
       ?>

<?php
  $db_spojenie = mysqli_connect('127.0.0.1', 'root','','db_kviz','3306');

    if ($db_spojenie){
            mysqli_query($db_spojenie,"SET NAMES 'utf8'");
            $objekt_vysledkov = mysqli_query($db_spojenie, "SELECT Body FROM $Skola WHERE Meno='$Meno'");
            $riadok = mysqli_fetch_array($objekt_vysledkov);
            echo  '<p>Získal/a si už dokopy ' . $riadok['Body'] . ' bodov.</p>';
        }

    else  {
            echo '<p>spojenie neúspešné</p>';
            echo '<p>Vzniknutá chyba: ' . mysqli_connect_error() . '</p>';
           }

if ($db_spojenie) mysqli_close($db_spojenie);
?>

  <p><a href="hlavna.php" class="btn">Návrat do menu</a></p>
  <a href="odhlasenie.php" class="btn">Odhlásenie</a>
</div>


<?php
   include_once "html_pata.php";
?>
