
<?php
include"bmcoder/header.php";
include"bmcoder/sidebar.php";
$kullanici = $_GET['kullanici'];
$sorgu5 = $baglanti->prepare("SELECT * FROM kullanicilar WHERE kullanici = '".$_GET["kullanici"]."'" );
	$sorgu5->execute();
    $sonuc5 = $sorgu5->fetch();//sorgu çalıştırılıp veriler alınıyor

 

$durum = $_GET['durum'];
$bakiye = $_GET['bakiye'];


    $newbakiye = $sonuc5['bakiye'] - $bakiye;
  



    		$satir = [
    		'id' => $_GET['id'],
    		'durum' => $durum,
    		

    	];
    	$satir2 = [
    	    'kullanici' => $kullanici,
    	        		'newbakiye' => $newbakiye,
];
    	
    		$sql = "UPDATE odemetalepleri SET durum=:durum WHERE id=:id;";
    		$durum = $baglanti->prepare($sql)->execute($satir);

    		if ($durum) {
    		    		
      echo'<meta http-equiv="refresh" content="0;URL=paracek.php">
',
       header('Location: gorev-talep.php');
}
else{
echo'HATA';
}
    
            
include"bmcoder/footer.php"?>

</html>
    