  <!-- Çıkış Yapma (cikis.php)  -->
<?php
session_start();
session_destroy();
setcookie("cerez", md5("aa" . $txtkullanici . "bb"), time() - 1);

header("location:index.php");

?>