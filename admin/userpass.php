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
                            if ($_POST) {
                                $npw  = md5('56' . $_POST['parola'] . '23');  

                                    $satir = [
    	'id' => $_GET['userid'],
    		'parola' => $npw, 
    	
    		

    	];
    	
    		$sql = "UPDATE kullanicilar SET parola=:parola WHERE id=:id;";
    		$durum = $baglanti->prepare($sql)->execute($satir);

    		if ($durum) {
    			echo '<div class="alert alert-success">Şifre başarıyla güncellendi,yönlendiriliyorsunuz.</div>
    			<meta http-equiv="refresh" content="3;URL=uyeler">
';

    	
    		} 
                                }
                             

  

?>                          
                            <div class="card-body">
                                <form method="post" class="form-horizontal form-material">
                               
                                    <div class="form-group">
                                
                                
								        <div class="form-group">
                                        <label class="col-md-12">Yeni Şifre</label>
                                        <div class="col-md-12">
                                            <input type="password" name="parola"  class="form-control form-control-line">
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

</html>