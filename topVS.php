<?php
  $titulok = "TOP 10 vysokoškolákov";
  include_once "html_hlavicka.php";
  session_start();
  $prihlasenie = $_SESSION['prihlasenie'];
  if($prihlasenie != "admin"){
    echo '<script type="text/JavaScript">window.open("index.php", "_self"); </script>';
  }
?>

   <img class="small" src="nazov.png" width="70%" height="300%" align="center" border="0" alt="Spoznaj univerzitu">
   <img class="big" src="nazov.png" width="35%" height="150 px" align="center" border="0" alt="Spoznaj univerzitu">

   <div id="obsah">



 <?php
   $db_spojenie = mysqli_connect('127.0.0.1', 'root','','db_kviz','3306');

	if ($db_spojenie) {
    mysqli_query($db_spojenie,"SET NAMES 'utf8'");
    $objekt_vysledkov = mysqli_query($db_spojenie, 'SELECT * FROM uzivatelia_vs ORDER BY Body DESC LIMIT 10');
		if (!$objekt_vysledkov) die ('Chyba v príkaze SQL: ' . mysqli_error($db_spojenie));

    echo('<h2 class = "heading">TOP 10 užívateľov - vysokoškolákov podľa bodov</h2>');
    echo '<div class = "container odsadenie">';
    echo('<table align="auto" border="2";>');
    echo'<td>Meno';
    echo'<td>Email';
    echo'<td>Počet bodov';
    echo'<tr>';
    foreach ($objekt_vysledkov as $o) {
        echo'<td>' . (htmlspecialchars($o['Meno']));
        echo'<td>' . (htmlspecialchars($o['Email']));
        echo'<td>' . (htmlspecialchars($o['Body']));
        echo('</td></tr>');
    }

    echo '</div>';
    echo('</table>');


    mysqli_free_result ($objekt_vysledkov);
  }

  else {
		echo 'spojenie neúspešné';
    echo 'Vzniknutá chyba: ' . mysqli_connect_error();
    }
?>

    </div>
    <a href="adminpanel.php" class="btn">Späť na AdminPanel</a>

<?php
   include_once "html_pata.php";
?>
