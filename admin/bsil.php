<?php
include"bmcoder/header.php";
include"bmcoder/sidebar.php";
$id = $_GET['id'];
    $sorgu = $baglanti->query("DELETE FROM bildirimler WHERE id = $id");

    if ($sorgu->rowCount() > 0) {
        echo'<meta http-equiv="refresh" content="0;URL=bildirim.php">
',
       header('Location: bildirim.php');

    } else {
        echo "Herhangi bir kayıt silinemedi.";
    }


include"bmcoder/footer.php"?>
