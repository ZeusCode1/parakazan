<?php
include"bmcoder/fonk.php";
session_start(); //oturum başlattık

//eğer mevcut oturum varsa sayfayı yönlendiriyoruz.
if (!(isset($_SESSION["Oturum"]) && $_SESSION["Oturum"] == "56789")) {
    header("location:login.php");
	
} //eğer önceden beni hatırla işaretlenmiş ise oturum oluşturup sayfayı yönlendiriyoruz.
$sorgu2 = $baglanti->prepare("SELECT * FROM admin WHERE kullanici='".$_SESSION["kullanici"]."'");
	$sorgu2->execute();
    $sonuc2 = $sorgu2->fetch();//sorgu çalıştırılıp veriler alınıyor
    
    $sorgu3 = $baglanti->prepare("SELECT * FROM siteayar");
	$sorgu3->execute();
    $sonuc3 = $sorgu3->fetch();//sorgu çalıştırılıp veriler alınıyor
?>	
<!DOCTYPE html>
<head>
 <html lang="tr">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?=$sonuc3['aciklama']?>">
        <meta name="keywords" content="<?=$sonuc3['kelime']?>">

    <meta name="author" content="BMCODER">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title><?=$sonuc3['baslik']?></title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo"https://"; echo$_SERVER['SERVER_NAME'];
  echo'/panel/node_modules/jqvmap/dist/jqvmap.min.css">';?>
  <link rel="stylesheet" href="<?php echo"https://"; echo$_SERVER['SERVER_NAME'];
  echo'/panel/node_modules/summernote/dist/summernote-bs4.css">';?>
  <link rel="stylesheet" href="<?php echo"https://"; echo$_SERVER['SERVER_NAME'];
  echo'/panel/node_modules/owl.carousel/dist/assets/owl.carousel.min.css">';?>
  <link rel="stylesheet" href="<?php echo"https://"; echo$_SERVER['SERVER_NAME'];
  echo'/panel/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">';?>

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo"https://"; echo$_SERVER['SERVER_NAME'];
  echo'/panel/assets/css/style.css">';?>
  <link rel="stylesheet" href="<?php echo"https://"; echo$_SERVER['SERVER_NAME'];
  echo'/panel/assets/css/components.css"';?>>
</head>


