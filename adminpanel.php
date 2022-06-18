<?php
  $titulok = "Adminpanel";
  include_once "html_hlavicka.php";
  session_start();
  $Meno= $_SESSION['Meno'];
  $prihlasenie = $_SESSION['prihlasenie'];
  if($prihlasenie != "admin"){
    echo '<script type="text/JavaScript">window.open("index.php", "_self"); </script>';
  }
?>

                <img class="small" src="nazov.png" width="70%" height="300%" align="center" border="0" alt="Spoznaj univerzitu">
                <img class="big" src="nazov.png" width="35%" height="150 px" align="center" border="0" alt="Spoznaj univerzitu">     

              <div id="obsah">
                
                <h1 class="heading">Hlavný admin panel</h1>
                <?php
                    echo "<p>Vitaj $Meno</p>";
                ?>
                   <p><a href="topVS.php" class="btn">TOP 10 VŠ</a></p>   
                   <p><a href="topSS.php" class="btn">TOP 10 SŠ</a></p>   
                   <p><a href="pridatotazku.php" class="btn">Pridať otázku</a></p>   
                   <p><a href="vymazanie.php" class="btn">Vymazať databázu SŠ</a></p>   
                   <p><a href="odhlasenie.php" class="btn">Odhlásenie</a></p> 
                   
              </div>  
                  
<?php
  include_once "html_pata.php";
?>

  