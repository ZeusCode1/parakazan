<!DOCTYPE html>


<?php
include"bmcoder/header.php";
include"bmcoder/sidebar.php";
$id = $_GET['gorevid'];
    $sorgu = $baglanti->query("DELETE FROM gorevler WHERE id = $id");

    if ($sorgu->rowCount() > 0) {
        echo'<meta http-equiv="refresh" content="0;URL=gorevler.php">
',
       header('Location: gorevler.php');

    } else {
        echo "Herhangi bir kayıt silinemedi.";
    }


include"bmcoder/footer.php"?>

</html>