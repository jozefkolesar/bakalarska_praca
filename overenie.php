<?php
  $titulok = "Vitaj";
  include_once "html_hlavicka.php";
  session_start();
  $qr_code = $_COOKIE['code'];
  $Meno = $_SESSION['Meno'];
  $Skola = $_SESSION['skola'];
  $prihlasenie = $_SESSION['prihlasenie'];
  if($prihlasenie != "uzivatel"){
    echo '<script type="text/JavaScript">window.open("index.php", "_self"); </script>';
  }
?>

<?php

      $db_spojenie = mysqli_connect('127.0.0.1', 'root','','db_kviz','3306');  
        if ($db_spojenie){
               mysqli_query($db_spojenie,"SET NAMES 'utf8'"); 
               $objekt_vysledkov = mysqli_query($db_spojenie, "SELECT * FROM otazky WHERE Kod ='$qr_code'");
               $riadok = mysqli_fetch_array($objekt_vysledkov);
               $objekt_vysledkov2 = mysqli_query($db_spojenie, "SELECT * FROM obmedzenie WHERE Meno='$Meno' AND Pouzite='$qr_code'"); 
               while($row = mysqli_fetch_array($objekt_vysledkov2)){
                        $rows[] = $row;
                    }
               if(count($rows) == 0){
                    if($qr_code == $riadok['Kod']){
                          header('Location: kviz.php');
                    }
                    else{
                          $_SESSION['error'] = "Zadal si nesprávny QR kód, naskenuj QR kód znova";
                          header('Location: qr.php');
                        } 
               }
               else{
                    echo "<script type='text/javascript'>alert('Túto otázku si už zodpovedal.');</script>";
                    echo '<script type="text/JavaScript">window.open("hlavna.php", "_self"); </script>';
                   }
        }
        else {
          echo 'Spojenie neúspešné';
          echo 'Vzniknutá chyba: ' . mysqli_connect_error();
        }

      mysqli_free_result ($objekt_vysledkov);
      mysqli_free_result ($objekt_vysledkov2);
      if ($db_spojenie) mysqli_close($db_spojenie);    
?>

<?php
  include_once "html_pata.php";
?>
