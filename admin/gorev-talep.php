<!DOCTYPE html>


<?php
include"bmcoder/header.php";
include"bmcoder/sidebar.php";
?>
       
        <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
							<h3>Görevler Talepleri
</h3>


</center>
 <div class="well">

            

          <div class="table-responsive">

                <table class="table table-striped table-bordered table-checkable ">
                  <thead>
                    <tr>
                      <th>Görev id</th>
                      <th>Görev İsimi</th>
                      <th>Açıklama</th>
                                            <th>Kanıt</th>

                       <th>İşlem</th>

                    </tr>
                  </thead>
                  <tbody>

						
                      <?php
       $sorgu = $baglanti->query("Select * from gorevyap  WHERE durum=1"); // Sorgumuzu Yazdık
            $sorgu->execute();
            while ($sonuc = $sorgu->fetch()) {
        
            ?>  <tr>
                    <td><?=$sonuc["gorevid"]?></td>
                      <td><?=$sonuc["gorevbaslik"]?></td>
          <td><?=$sonuc['aciklama']?></td>
          <td><a class="btn btn-primary" target="_blank" href="kanitgor.php?kanitresim=<?=$sonuc['resimurl']?>">Tıkla Gör</a></td>

                               <td><a class="btn btn-sm btn-success" href="gorev-islem?gorevid=<?=$sonuc["id"]?>&kullanici=<?=$sonuc["kullanici"]?>&durum=2&bakiye=<?=$sonuc['ucret']?>">Onayla</a> <a class="btn btn-sm btn-danger" href="gorev-islem?gorevid=<?=$sonuc["id"]?>&kullanici=<?=$sonuc["kullanici"]?>&durum=3&bakiye=0">İptal Et</a></td>

                     
                   <?php  }?>
                   </td>
                   
                    </tr>
                    </tbody>
                  </table>
                </div>
            </div>
                 </div>    </div>
                            </div>
                        
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
	    
	     <?php include"bmcoder/footer.php"?>

</html>