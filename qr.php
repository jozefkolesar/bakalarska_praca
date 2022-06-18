<?php
  $titulok = "Skenovanie";
  include_once "html_hlavicka.php";
  session_start();
  $prihlasenie = $_SESSION['prihlasenie'];
  if($prihlasenie != "uzivatel"){
    echo '<script type="text/JavaScript">window.open("index.php", "_self"); </script>';
  }
?>

<div id="obsah">
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js" ></script>
    <video id="preview"></video>
    <?php
        if(isset($_SESSION['error'])){
            echo '<p>' . $_SESSION['error'] . '</p>';
            unset ($_SESSION["error"]);
        }
    ?>
    <p><a href="hlavna.php" class="btn">Zrušiť skenovanie</a></p>
</div>

    <script>
        let scanner = new Instascan.Scanner(
            {
                video: document.getElementById('preview')
            }
        );
        scanner.addListener('scan', function(content) {
            alert('Kód bol naskenovaný, pokračuj stlačením OK');
            document.cookie = "code=" + content;
            window.open("overenie.php", "_self")

        });
        Instascan.Camera.getCameras().then(cameras =>
        {
            if(cameras.length > 0){
                scanner.start(cameras[0]);
            } else {
                console.error("V zariadení sa nenachádza žiadna kamera!");
            }
        });
    </script>

<?php
  include_once "html_pata.php";
?>
