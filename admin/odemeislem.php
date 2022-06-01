<?php
include"bmcoder/header.php";
include"bmcoder/sidebar.php";
$kullanici = $_GET['kullanici'];
$sorgu5 = $baglanti->prepare("SELECT * FROM kullanicilar WHERE kullanici = '".$_GET["kullanici"]."'" );
	$sorgu5->execute();
    $sonuc5 = $sorgu5->fetch();//sorgu çalıştırılıp veriler alınıyor

 

$id = $_GET['id'];
$durum = $_GET['durum'];
$bakiye = $_GET['bakiye'];


    $newbakiye = $sonuc5['bakiye'] + $bakiye;
  


    		$satir = [
    		'id' => $_GET['id'],
    		'durum' => $durum,
    		

    	];
    	$satir2 = [
    	    'kullanici' => $kullanici,
    	        		'newbakiye' => $newbakiye,
];
    	
    		$sql = "UPDATE odemebildir SET durum=:durum WHERE id=:id;";
    		$durum = $baglanti->prepare($sql)->execute($satir);

    		if ($durum) {
    		    		$sql2 = "UPDATE kullanicilar SET bakiye=:newbakiye WHERE kullanici=:kullanici;";
    		$durum2 = $baglanti->prepare($sql2)->execute($satir2);

if($durum2){
      echo'<meta http-equiv="refresh" content="0;URL=bakiye-talep.php">
',
       header('Location: bakiye-talep.php');
}
else{
echo'HATA';
}
    	
    		} 
            
include"bmcoder/footer.php"?>
