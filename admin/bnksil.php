<?php
include"bmcoder/header.php";
include"bmcoder/sidebar.php";
$id = $_GET['id'];
    $sorgu = $baglanti->query("DELETE FROM bankahesap WHERE id = $id");

    if ($sorgu->rowCount() > 0) {
        echo'<meta http-equiv="refresh" content="0;URL=banka.php">
',
       header('Location: banka.php');

    } else {
        echo "Herhangi bir kayıt silinemedi.";
    }


include"bmcoder/footer.php"?>
