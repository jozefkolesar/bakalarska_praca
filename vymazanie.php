<?php
  $titulok = "Vymazanie";
  include_once "html_hlavicka.php";
  session_start();
  $prihlasenie = $_SESSION['prihlasenie'];
  if($prihlasenie != "admin"){
    echo '<script type="text/JavaScript">window.open("index.php", "_self"); </script>';
  }
?>

<?php
  if($prihlasenie == 'admin'){
     $db_spojenie = mysqli_connect('127.0.0.1', 'root','','db_kviz','3306');
  	
      if ($db_spojenie) {
        mysqli_query($db_spojenie,"SET NAMES 'utf8'");  
        mysqli_query($db_spojenie, 'DELETE FROM uzivatelia_ss');
        mysqli_query($db_spojenie, 'DELETE FROM obmedzenie WHERE Skola = "uzivatelia_ss"'); 
      }

      else{
          echo 'Spojenie s databázou neúspešné';
          echo 'Vzniknutá chyba: ' . mysqli_connect_error();         
      } 
      if ($db_spojenie) mysqli_close($db_spojenie); 
   }    
?>

       <script type='text/Javascript'>
          alert('Celý obsah databázy užívateľov zo SŠ/gymnázia bol úspešne vymazaný!');
          window.open("adminpanel.php", "_self"); 
       </script>

<?php
      include_once "html_pata.php";
?>