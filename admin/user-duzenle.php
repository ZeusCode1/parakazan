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

    $hata = "";

  
    	$satir = [
    		'id' => $_GET['userid'],
    		'email' => $_POST['email'],
    		'tel' => $_POST['tel'],
    		'bakiye' => $_POST['bakiye'],
    		'isim' => $_POST['isim'],
    	
    		

    	];
    	
    		$sql = "UPDATE kullanicilar SET email=:email,tel=:tel,bakiye=:bakiye,isim=:isim WHERE id=:id;";
    		$durum = $baglanti->prepare($sql)->execute($satir);

    		if ($durum) {
    			echo '<div class="alert alert-success">Bilgileriniz başarıyla güncellendi,yönlendiriliyorsunuz.</div>
    			<meta http-equiv="refresh" content="3;URL=uyeler">
';

    	
    		} 
    }
    $gorevid = $_GET['userid'];
$sorgu4 = $baglanti->query("SELECT * FROM kullanicilar WHERE id= $gorevid");
	$sorgu4->execute();
            while ($sonuc4 = $sorgu4->fetch()) {   // Sorgulumuzu While ile Döndürüyoruz

                           
                            ?>                         
                            <div class="card-body">
                                <form method="post" class="form-horizontal form-material">
                                      <div class="form-group">
                                        <label class="col-md-12">Kullanıcı Adı</label>
                                        <div class="col-md-12">
                                            <input name="kullanici" type="text" value="<?= $sonuc4["kullanici"] ?>" class="form-control form-control-line" disabled>
                                        </div>
                                    </div>
                                      <div class="form-group">
                                        <label class="col-md-12">İsim-soyisim</label>
                                        <div class="col-md-12">
                                            <input name="isim" type="text" value="<?= $sonuc4["isim"] ?>" class="form-control form-control-line" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  for="example-email" class="col-md-12">E-Mail</label>
                                        <div class="col-md-12">
                                            <input name="email" type="text" name="baslik" value="<?= $sonuc4["email"] ?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Telefon</label>
                                        <div class="col-md-12">
                                            <input name="tel" type="text" value="<?= $sonuc4["tel"] ?>" class="form-control form-control-line" >
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="example-email" class="col-md-12">Bakiye</label>
                                        <div class="col-md-12">
                                            <input  name="bakiye" value="<?= $sonuc4["bakiye"] ?>" class="form-control form-control-line" >
                                        </div>
                                    </div>
                                   
                                    
                               <?php
            }?>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Profili Düzenle</button>    </form>    <a class="btn btn-info" href="userpass?userid=<?=$gorevid?>">Şifre değiştir</a>
                                        </div>
                                    </div>
                                    
                            
                           
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Profil Düzenle -->
              
          <?php include"bmcoder/footer.php";?>

</html>