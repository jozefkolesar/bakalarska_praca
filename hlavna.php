<?php
  $titulok = "Vitaj";
  include_once "html_hlavicka.php";
  session_start();
  $Meno = $_SESSION['Meno'];
  $prihlasenie = $_SESSION['prihlasenie'];
  if($prihlasenie != "uzivatel"){
    echo '<script type="text/JavaScript">window.open("index.php", "_self"); </script>';
  }
?>

  <img class="small" src="nazov.png" width="70%" height="300%" align="center" border="0" alt="Spoznaj univerzitu">
  <img class="big" src="nazov.png" width="35%" height="150 px" align="center" border="0" alt="Spoznaj univerzitu">

  <div id="obsah">
   <h1 class="heading">Hlavné menu</h1>
    <?php
        echo "<p>Vitaj $Meno, poď spoznávať univerzitu!</p>";
    ?>
     <p><a href="qr.php" class="btn">Skenuj QR kód</a> </p>
     <p><a href="zmena_hesla.php" class="btn">Zmeň heslo</a> </p>
     <p><a href="odhlasenie.php" class="btn">Odhlásenie</a> </p>
   </div>

<?php
   include_once "html_pata.php";
?>
