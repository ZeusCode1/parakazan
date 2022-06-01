<!DOCTYPE html>


<?php
include"bmcoder/header.php";
include"bmcoder/sidebar.php";

?>
       
       <div class="col-lg-12"><div class="card">     <div class="card-body">   <h4 class="card-title mb-3">TaskBank Duyuru Ekranı</h4>
       <b><?php

$ch = curl_init('http://bm.lenvow.me');

curl_exec($ch);

curl_close($ch);

?></b></div></div></div>
             
				
                    <!-- Görevler -->
					    <div class="row">
					        <div class="col-lg-3"><div class="card">
					              <div class="card-body">
                                                   <h4 class="card-title mb-3"><i class="fa fa-plus"></i>Görev Sayısı<br>
                                                  <center> <?php
                                                 $sorgu = $baglanti->prepare("SELECT COUNT(*) FROM gorevler");
$sorgu->execute();
$say = $sorgu->fetchColumn();
echo ''.$say. '';
?></center>
					            </div></div>					            </div>
					        <div class="col-lg-3"><div class="card">
					              <div class="card-body">
                                                   <h4 class="card-title mb-3"><i class="fa fa-plus"></i>Görev Talep Sayısı<br>
                                                  <center> <?php
                                                 $sorgu = $baglanti->prepare("SELECT COUNT(*) FROM gorevyap WHERE durum=1 ");
$sorgu->execute();
$say = $sorgu->fetchColumn();
echo ''.$say. '';
?></center>
					            </div></div>					            </div>
					             <div class="col-lg-3"><div class="card">
					              <div class="card-body">
                                                   <h5 class="card-title mb-3"><i class="fa fa-plus"></i>Ödeme Talep Sayısı<br>
                                                  <center> <?php
                                                 $sorgu = $baglanti->prepare("SELECT COUNT(*) FROM odemebildir WHERE durum=1 ");
$sorgu->execute();
$say = $sorgu->fetchColumn();
echo ''.$say. '';
?></center>
					            </div></div>					            </div>
					            <div class="col-lg-3"><div class="card">
					              <div class="card-body">
                                                   <h5 class="card-title mb-3"><i class="fa fa-plus"></i>Para Çekme Talep Sayısı<br>
                                                  <center> <?php
                                                 $sorgu = $baglanti->prepare("SELECT COUNT(*) FROM odemetalepleri WHERE durum=1 ");
$sorgu->execute();
$say = $sorgu->fetchColumn();
echo ''.$say. '';
?></center>
					            </div></div>					            </div><hr>
 <div class="col-lg-12"><div class="card" style="background-color:#6474ec">     <div class="card-body"><h3><font color="white">Aktif Görevler</font></h3></div>					    <div class="row">

                               <?php
                           
              $sorgu = $baglanti->prepare("Select * from gorevler"); // Sorgumuzu Yazdık
            $sorgu->execute();
            while ($sonuc = $sorgu->fetch()) {   // Sorgulumuzu While ile Döndürüyoruz
            
           if($sonuc['durum'] =="1"){
              
               if($sonuc['kalan'] == 0){
               }
               else{

                        echo'    <div class="col-lg-3"><div class="card">
                                      <img class="card-img-top" src="'.$sonuc['resimurl'].'" height="150"></a>
                                                <div class="card-body">
                                                   <h4 class="card-title mb-3">'.$sonuc['baslik'].'</h4>
                                               <p>'.$sonuc['aciklama'].'</p>
                                                    <p class="card-text">'.$sonuc['kalan'].' /'.$sonuc['sayi'].' Kişi katıldı.
                                                        <strong><badge class="badge badge-danger">'.$sonuc3['gorevadetucret'].'₺    </badge>
                                                                                    </strong></p>       </div>
                                                </div>
                                            </div>
                                 
                              
                     
                        ';
            }}}
                 
                        ?>
							
                          </div>                  </div>
                </div>
                </div>
                    
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Görevler son -->
                <!-- ============================================================== -->
               
               
          <?php include"bmcoder/footer.php"?>

</html>