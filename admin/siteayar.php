<?php
include"bmcoder/header.php";
include"bmcoder/sidebar.php";

?>
       
       
      
              
              <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <h3>Site Ayar</h3>
                            <!-- Tab panes -->
                            <?php
                            if ($_POST) { // Sayfada post olup olmadığını kontrol ediyoruz.

    

  
    	$satir = [
    		'sitead' => $_POST['sitead'],
    		'kisa' => $_POST['kisa'],
    		'baslik' => $_POST['baslik'],
    		'aciklama' =>  $_POST['aciklama'],
    		'kelime' => $_POST['kelime'],
    		'odememin' => $_POST['odememin'],
    		'gorevucret' => $_POST['gorevucret'],
    		'gorevsatadet' => $_POST['gorevsatadet'],
    		'gorevadetucret' => $_POST['gorevadetucret']

    	];
    	
    		$sql = "UPDATE siteayar SET sitename=:sitead,kisa=:kisa,baslik=:baslik,aciklama=:aciklama,kelime=:kelime,odememin=:odememin,gorevucret=:gorevucret,gorevsatadet=:gorevsatadet,gorevadetucret=:gorevadetucret";
    		$durum = $baglanti->prepare($sql)->execute($satir);

    		if ($durum) {
    			echo '<div class="alert alert-success">Site ayarları başarıyla güncellendi,yönlendiriliyorsunuz.</div>
    			<meta http-equiv="refresh" content="3;URL=index">
';

    	
    		} 
    }
?>                          
                            <div class="card-body">
                                <form method="post" class="form-horizontal form-material">
                                      <div class="form-group">
                                        <label class="col-md-12">Site Adı</label>
                                        <div class="col-md-12">
                                            <input type="text" value="<?= $sonuc3["sitename"] ?>" name="sitead" class="form-control form-control-line" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Kısaltılmış Ad(Menü)</label>
                                        <div class="col-md-12">
                                            <input type="text" name="kisa" value="<?= $sonuc3["kisa"] ?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                   <div class="form-group">
                                        <label class="col-md-12">Başlık</label>
                                        <div class="col-md-12">
                                            <input type="text" name="baslik" value="<?= $sonuc3["baslik"] ?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Açıklama</label>
                                        <div class="col-md-12">
                                            <input type="text" name="aciklama" value="<?= $sonuc3["aciklama"] ?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Anahtar Kelimeler(Virgülle ayırınız)</label>
                                        <div class="col-md-12">
                                            <input type="text" name="kelime" value="<?= $sonuc3["kelime"] ?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-12">Minumum Ödeme Tutarı</label>
                                        <div class="col-md-12">
                                            <input type="number" name="odememin" value="<?= $sonuc3["odememin"] ?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-12">Görev Yayınlamak İçin Gerekli Bakiye</label>
                                        <div class="col-md-12">
                                            <input type="text" name="gorevucret" value="<?= $sonuc3["gorevucret"] ?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-12">Görev Yayınlama Adet Ücret(Görev yayınlayan kişinin 1 görev yapma için ödeyeceği tutar)</label>
                                        <div class="col-md-12">
                                            <input type="text" name="gorevsatadet" value="<?= $sonuc3["gorevsatadet"] ?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-12">Görev Yapan Kullanıcıya Eklenecek Tutar</label>
                                        <div class="col-md-12">
                                            <input type="text" name="gorevadetucret" value="<?= $sonuc3["gorevadetucret"] ?>" class="form-control form-control-line">
                                        </div>
                                    </div>
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