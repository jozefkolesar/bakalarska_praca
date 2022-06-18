<?php
  $titulok = "Prihlásenie";
  include_once "html_hlavicka.php";
  session_start();

?>

  <img class="small" src="nazov.png" width="70%" height="300%" align="center" border="0" alt="Spoznaj univerzitu">
  <img class="big" src="nazov.png" width="35%" height="150 px" align="center" border="0" alt="Spoznaj univerzitu">
  
  <div>
  
  
      <h2 class="heading">Prihlás sa</h2>
          <form action="prihlasenie.php" method="post" class="login-form">
                <div>  
                    <p>Meno/nick:</p>
                    <input type="text" name="Meno">
                    <p>Heslo:</p>
                    <input type="password" name="Heslo">
                </div>
              <div class="odsadenie">          
                <p><input type="submit" name="prihlasenie" value="Prihlásiť"></p>
              </div>
            </form>
          <a href="index.php" class="btn">Domov</a>
    
    </div>    
  
<?php
  if(isset($_POST['prihlasenie'])){
      
        $Meno_prihlasenia=$_POST['Meno'];
        $Heslo_prihlasenia=$_POST['Heslo'];
      
        if(($Meno_prihlasenia !='') AND ($Heslo_prihlasenia !='')){
             $db_spojenie = mysqli_connect('127.0.0.1', 'root','','db_kviz','3306');
      
             if ($db_spojenie){
                      mysqli_query($db_spojenie,"SET NAMES 'utf8'"); 
                      $objekt_vysledkov = mysqli_query($db_spojenie, "SELECT Meno, Heslo FROM uzivatelia_ss WHERE Meno='$Meno_prihlasenia' AND Heslo='$Heslo_prihlasenia'");
                      $riadok = mysqli_fetch_array($objekt_vysledkov);

                      $objekt_vysledkov2 = mysqli_query($db_spojenie, "SELECT Meno, Heslo FROM uzivatelia_vs WHERE Meno='$Meno_prihlasenia' AND Heslo='$Heslo_prihlasenia'");
                      $riadok2 = mysqli_fetch_array($objekt_vysledkov2);
                       
                    if(($Meno_prihlasenia == $riadok['Meno'] AND $Heslo_prihlasenia == $riadok['Heslo']) or ($Meno_prihlasenia == $riadok2['Meno'] AND $Heslo_prihlasenia == $riadok2['Heslo']))     //ak sa meno a heslo zhoduje s menom a heslom v databáze - úspešné prihlásenie
                       {
                        $_SESSION['Meno'] = $Meno_prihlasenia;
                        $_SESSION['prihlasenie'] = "uzivatel";
                        
                        if($Meno_prihlasenia == $riadok['Meno'] AND $Heslo_prihlasenia == $riadok['Heslo']){
                                    $_SESSION['skola'] = "uzivatelia_ss";
                        }
                        elseif($Meno_prihlasenia == $riadok2['Meno'] AND $Heslo_prihlasenia == $riadok2['Heslo']){
                                    $_SESSION['skola'] = "uzivatelia_vs";
                        }

                        if($Meno_prihlasenia=='admin'){
                             $_SESSION['prihlasenie'] = "admin";
                             header('Location: adminpanel.php');
                        }

                        else{
                           header('Location: hlavna.php');
                        }
                      }

                  else {
                        echo "<script type='text/javascript'>alert('Neúspešné prihlásenie. Opakuj prihlásenie, alebo sa zaregistruj.');</script>"; 
                        mysqli_free_result ($objekt_vysledkov);
                        mysqli_free_result ($objekt_vysledkov2);    
                  }           
              }
              else  {
                     echo 'spojenie neúspešné';
                     echo 'Vzniknutá chyba: ' . mysqli_connect_error();
                    }
              if ($db_spojenie) mysqli_close($db_spojenie);
                  
        }             
  }    
?>

<?php
  include_once "html_pata.php";
?>