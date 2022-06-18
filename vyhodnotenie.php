<?php
session_start();
$Meno_prihlasenia= $_SESSION['Meno'];
$spravna = $_POST['spravna'];
$Skola = $_SESSION['skola'];
$prihlasenie = $_SESSION['prihlasenie'];
  if($prihlasenie != "uzivatel"){
    echo '<script type="text/JavaScript">window.open("index.php", "_self"); </script>';
  }

        if (isset($_POST['odpoved'])){  
         
          $odpoved = $_POST['odpoved_uzivatela'];
          echo $odpoved;
          $odpoved = strtolower($odpoved);
          echo $spravna; 
            if($odpoved == $spravna){
                   mysqli_free_result ($objekt_vysledkov); 
                   if ($db_spojenie) mysqli_close($db_spojenie);

                        $db_spojenie = mysqli_connect('127.0.0.1', 'root','','db_kviz','3306');
      
                          if ($db_spojenie) 
                                {
                                    mysqli_query($db_spojenie,"SET NAMES 'utf8'");

                                    $riadok = mysqli_query($db_spojenie, "UPDATE $Skola SET Body = Body + 1 WHERE Meno = '$Meno_prihlasenia';");
                                    
                                              
                                    mysqli_free_result ($riadok);
                                    if ($db_spojenie) mysqli_close($db_spojenie);
                                  }
                          else 
                              {
                                  echo 'Spojenie s databázou neúspešné';
                                  echo 'Vzniknutá chyba: ' . mysqli_connect_error();
                              } 


                   $_SESSION['spravnaodpoved'] = 'spravnaodpoved';             
                   header('Location: vysledok.php');
              } 
              
              else{
                mysqli_free_result ($objekt_vysledkov); 
                $_SESSION['spravnaodpoved'] = "nespravnaodpoved"; 
                header('Location: vysledok.php');
             }

          }                     
?>