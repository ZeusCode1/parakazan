<!DOCTYPE html>


<?php
include"bmcoder/header.php";
include"bmcoder/sidebar.php";
?>
       
        <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

							   
							    


           

              <p style="text-align: center;">
                <span style="font-size: 36px;">Geçmiş Ödeme Talepleriniz</span>
              </p>

              <div class="table-responsive">
                <table class="table table-striped table-bordered table-checkable ">
                  <thead>
                    <tr>
                      <th>Banka Adı</th>
                      <th>Miktar</th>
                      <th>Tarih</th>
                      <th>Durum</th>

                    </tr>
                  </thead>
                  <tbody>
                     <?php
$sorgu4 = $baglanti->query("SELECT * FROM odemebildir WHERE kullanici='".$_SESSION["kullanici"]."'");
	$sorgu4->execute();
            while ($sonuc4 = $sorgu4->fetch()) {   // Sorgulumuzu While ile Döndürüyoruz
    ?>
                    <tr>
                    
                      <td><?=$sonuc4["banka"]?></td>
                      <td><?=$sonuc4["miktar"]?></td>
                                           <td><?=$sonuc4["date"]?></td>
                      <td>  <?php if($sonuc4["durum"] == 1){
                          echo'Ödeme Bekliyor';
                          }
                             if($sonuc4["durum"] == 2){
                              echo'Ödeme Yapıldı';
                          }
                             if($sonuc4["durum"] == 3){
                                 echo'İptal Edildi';
                             }?></td>

                     <?php     }?>
                          </tr>
                    </tbody>
                  </table>
                    </div>
                </div>
	   
                </div>
            </div>
          
                    </div>
                </div>
                    </div>
                </div>
	   
	   
	     <?php include"bmcoder/footer.php"?>

</html>