<!DOCTYPE html>

<?php
include"bmcoder/header.php";
include"bmcoder/sidebar.php";
$kullanici = $_GET['kullanici'];
$sorgu5 = $baglanti->prepare("SELECT * FROM kullanicilar WHERE kullanici = '".$_GET["kullanici"]."'" );
	$sorgu5->execute();
    $sonuc5 = $sorgu5->fetch();//sorgu çalıştırılıp veriler alınıyor
$referans = $sonuc5["referans"] ;

$bakiye = $_GET['bakiye'];

if($referans==""){
    
}
else{
 $sorgu6 = $baglanti->prepare("SELECT * FROM kullanicilar WHERE kod=$referans" );
	$sorgu6->execute();
    $sonuc6 = $sorgu6->fetch();//sorgu çalıştırılıp veriler alınıyor
$refid = $sonuc6['id'];
$bmb = $sonuc6['bakiye'];
$nwbky = $bmb+($bakiye/100*10);
echo $nwbky;
	$satir4 = [
    	 
    	        		'nwbky' => $nwbky,
    	        		'refid' => $refid,
];
    	
	$sql4 = "UPDATE kullanicilar SET bakiye=:nwbky WHERE id=:refid;";
    		$durum4 = $baglanti->prepare($sql4)->execute($satir4);
}
    		$id = $_GET['gorevid'];
$durum = $_GET['durum'];
	$satir = [
    		'id' => $_GET['gorevid'],
    		'durum' => $durum,
    		

    	];
	$sql = "UPDATE gorevyap SET durum=:durum WHERE id=:id;";
    		$durum = $baglanti->prepare($sql)->execute($satir);


    		
    $newbakiye = $sonuc5['bakiye'] + $bakiye;
  

$id = $_GET['gorevid'];
$kullanici = $_GET['kullanici'];
$durum = $_GET['durum'];
$bakiye = $_GET['bakiye'];

    	
    	$satir2 = [
    	    'kullanici' => $kullanici,
    	        		'newbakiye' => $newbakiye,
];
    	
    		$sql = "UPDATE gorevyap SET durum=:durum WHERE id=:id;";
    		$durum = $baglanti->prepare($sql)->execute($satir);

    		if ($durum) {
    		    		$sql2 = "UPDATE kullanicilar SET bakiye=:newbakiye WHERE kullanici=:kullanici;";
    		$durum2 = $baglanti->prepare($sql2)->execute($satir2);

if($durum2){
      echo'<meta http-equiv="refresh" content="0;URL=gorev-talep.php">
',
       header('Location: gorev-talep.php');
}
else{
echo'HATA';
}
    	
    		} 
            
include"bmcoder/footer.php"?>

</html>
    
