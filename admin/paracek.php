<!DOCTYPE html>


<?php
include"bmcoder/header.php";
include"bmcoder/sidebar.php";
?>
       
        <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
							<h3>Para Çekme Talepleri
</h3>


</center>
 <div class="well">

            

          <div class="table-responsive">

                <table class="table table-striped table-bordered table-checkable ">
                  <thead>
                    <tr>
                      <th>Kullanıcı</th>
                      <th>Tutar</th>
                      <th>Çekim Hesabı</th>
                                            <th>Çekim Methodu</th>
<th>Tarih</th>

                       <th>İşlem</th>

                    </tr>
                  </thead>
                  <tbody>

						
                      <?php
       $sorgu = $baglanti->query("Select * from odemetalepleri  WHERE durum=1"); // Sorgumuzu Yazdık
            $sorgu->execute();
            while ($sonuc = $sorgu->fetch()) {
        
            ?>  <tr>
                    <td><?=$sonuc["kullanici"]?></td>
                      <td><?=$sonuc["bakiye"]?></td>
          <td><?=$sonuc['cekimhesabi']?></td>
                   <td><?=$sonuc['cekimmethodu']?></td>
          <td><?=$sonuc['date']?></td>


                               <td><a class="btn btn-sm btn-success" href="bakiye-islem?id=<?=$sonuc["id"]?>&kullanici=<?=$sonuc["kullanici"]?>&durum=2&bakiye=<?=$sonuc['bakiye']?>">Onayla</a> <a class="btn btn-sm btn-danger" href="bakiye-islem?id=<?=$sonuc["id"]?>&kullanici=<?=$sonuc["kullanici"]?>&durum=3&bakiye=<?=$sonuc['bakiye']?>">İptal Et</a></td>

                     
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