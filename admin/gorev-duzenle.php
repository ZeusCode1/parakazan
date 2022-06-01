<!DOCTYPE html>


<?php
include"bmcoder/header.php";
include"bmcoder/sidebar.php";

?>
       
       
      
              
                <!-- Profil Düzenle -->
                <div class="row">
             
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-12 col-md-7">
                        <div class="card">
                            <!-- Tab panes -->
                            <?php
                            
                            if ($_POST) { // Sayfada post olup olmadığını kontrol ediyoruz.
$baslik = $_POST['baslik'];
    // Değişkenleri MD5 Formatıyla belirtilen aralıklara göre ile şifreliyoruz
 $aciklama = $_POST['aciklama'];
 $link = $_POST['link'];
 $resimurl = $_POST['resimurl'];
 $sayi = $_POST['sayi'];
 $ucret = $_POST["ucret"];
    $hata = "";

  
    	$satir = [
    		'id' => $_GET['gorevid'],
    		'baslik' => $baslik,
    		'aciklama' => $aciklama,
    		'link' => $link,
    		'resimurl' => $resimurl,
    		'sayi' => $sayi,
    		'ucret' => $ucret
    		

    	];
    	
    		$sql = "UPDATE gorevler SET baslik=:baslik,aciklama=:aciklama,link=:link,resimurl=:resimurl,sayi=:sayi,ucret=:ucret WHERE id=:id;";
    		$durum = $baglanti->prepare($sql)->execute($satir);

    		if ($durum) {
    			echo '<div class="alert alert-success">Bilgileriniz başarıyla güncellendi,yönlendiriliyorsunuz.</div>
    			<meta http-equiv="refresh" content="3;URL=gorevler">
';

    	
    		} 
    }
    $gorevid = $_GET['gorevid'];
$sorgu4 = $baglanti->query("SELECT * FROM gorevler WHERE id= $gorevid");
	$sorgu4->execute();
            while ($sonuc4 = $sorgu4->fetch()) {   // Sorgulumuzu While ile Döndürüyoruz

                           
                            ?>                         
                            <div class="card-body">
                                <form method="post" class="form-horizontal form-material">
                                      <div class="form-group">
                                        <label class="col-md-12">Görev İd</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?= $sonuc4["id"] ?>" class="form-control form-control-line" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Başlık</label>
                                        <div class="col-md-12">
                                            <input type="text" name="baslik" value="<?= $sonuc4["baslik"] ?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Açıklama</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?= $sonuc4["aciklama"] ?>" class="form-control form-control-line" name="aciklama" id="aciklama">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="example-email" class="col-md-12">Link</label>
                                        <div class="col-md-12">
                                            <input type="url" value="<?= $sonuc4["link"] ?>" class="form-control form-control-line" name="link" id="link">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="example-email" class="col-md-12">Resim Url</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?= $sonuc4["resimurl"] ?>" class="form-control form-control-line" name="resimurl" id="resimurl">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="example-email" class="col-md-12">Görev Sayısı</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?= $sonuc4["sayi"] ?>" class="form-control form-control-line" name="sayi" id="sayi">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="example-email" class="col-md-12">Ücret</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?= $sonuc4["ucret"] ?>" class="form-control form-control-line" name="ucret" id="ucret">
                                        </div>
                                    </div>
                               <?php
            }?>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Profili Düzenle</button>
                                        </div>
                                    </div>
                                    
                                </form>
                               
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Profil Düzenle -->
              
          <?php include"bmcoder/footer.php";?>

</html>