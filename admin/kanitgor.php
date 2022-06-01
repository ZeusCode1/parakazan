<?php

    $kanitresim = $_GET['kanitresim'];
    echo'<img src="https://'; echo$_SERVER['SERVER_NAME'];
  echo'/panel/'.$kanitresim.'" width="%100"/>';

?>