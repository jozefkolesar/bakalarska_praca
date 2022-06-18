<?php
  $titulok = "Odhlásenie";
  include_once "html_hlavicka.php";
  session_start();
  $Meno= $_SESSION['Meno'];
?>



<?php
	unset($_SESSION);          
	session_destroy();
	session_write_close();
	header('Location:index.php');
  exit;
?>