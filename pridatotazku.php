<?php
  $titulok = "Pridanie otázky";
  include_once "html_hlavicka.php";
  session_start();
  $Meno_prihlasenia= $_SESSION['Meno'];
  $prihlasenie = $_SESSION['prihlasenie'];
  if($prihlasenie != "admin"){
   echo '<script type="text/JavaScript">window.open("index.php", "_self"); </script>';
 }
?>

    <img class="small" src="nazov.png" width="70%" height="300%" align="center" border="0" alt="Spoznaj univerzitu">
    <img class="big" src="nazov.png" width="35%" height="150 px" align="center" border="0" alt="Spoznaj univerzitu">
<div>


  <form action="pridatotazku.php" method="post" class="login-form">
     <p>Zadaj presné znenie otázky:</p>
    <textarea name="otazka" rows="5" cols="30"></textarea>

    <p>Zadaj správnu odpoveď na vyššie uvedenú otázku: <p>
    <textarea name="odpoved" rows="5" cols="30"></textarea>

    <p>Zadaj kód otázky uložený v QR kóde: </p>
    <textarea name="kod" rows="5" cols="30"></textarea>

    <p class="odsadenie"><input type="submit" value="Pridať otázku" name="pridat"></p>

 </form>
   <div class="odsadenie"></div>
    <p><a href="adminpanel.php" class="btn">Späť na AdminPanel</a></p>
 </div>
<?php

 if (isset($_POST['pridat']))
     {

         $pridat_otazku = $_POST['otazka'];
         $pridat_odpoved = $_POST['odpoved'];
         $kod_otazky = $_POST['kod'];

      if(($pridat_otazku !='') AND ($pridat_odpoved !='') AND ($kod_otazky !='')){

            $db_spojenie = mysqli_connect('127.0.0.1', 'root','','db_kviz','3306');
            if ($db_spojenie)
	              {
                      mysqli_query($db_spojenie,"SET NAMES 'utf8'");
                      $objekt_vysledkov = mysqli_query($db_spojenie, "SELECT * FROM otazky WHERE Kod='$kod_otazky'");
                      $riadok = mysqli_fetch_array($objekt_vysledkov);
                      if($riadok['Kod'] != $kod_otazky){
                          $posli_data = mysqli_query($db_spojenie, "INSERT INTO otazky (Znenie, Spravna, Kod) VALUES ('$pridat_otazku', '$pridat_odpoved', '$kod_otazky')");
                          if (!$posli_data) die ('Chyba v príkaze SQL: ' . mysqli_error($db_spojenie));
                          echo "<script type='text/javascript'>alert('Otázka úspešne pridaná!');</script>";
                          echo '<script type="text/JavaScript">window.open("adminpanel.php", "_self"); </script>';
                      }
                      else{
                        echo "<script type='text/javascript'>alert('Tento kód otázky je už použitý, zvoľ prosím iný!');</script>";
                      }
                }

            else{
                  echo 'spojenie neúspešné';
                  echo 'Vzniknutá chyba: ' . mysqli_connect_error();
            }

            if ($db_spojenie) mysqli_close($db_spojenie);

        }
        else{
              echo "<script type='text/javascript'>alert('Nevyplnil si všetky polia!');</script>";
              echo '<script type="text/JavaScript">window.open("pridatotazku.php", "_self"); </script>';
        }
    }
?>

<?php
    include_once "html_pata.php";
?>
