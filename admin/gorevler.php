<!DOCTYPE html>


<?php
include"bmcoder/header.php";
include"bmcoder/sidebar.php";
?>
       
        <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
							<h3>Aktif Görevler
</h3>


</center>
 <div class="well">

            

          
                <table class="table table-striped table-bordered table-checkable ">
                  <thead>
                    <tr>
                      <th>Görev id</th>
                      <th>Görev İsimi</th>
                      <th>Kalan</th>
                       <th>İşlem</th>

                    </tr>
                  </thead>
                  <tbody>

						
                      <?php
       $sorgu = $baglanti->query("Select * from gorevler  WHERE durum=1"); // Sorgumuzu Yazdık
            $sorgu->execute();
            while ($sonuc = $sorgu->fetch()) {
          $kalan = $sonuc['sayi'] - $sonuc['kalan'] + 1;// Sorgulumuzu While ile Döndürüyoruz
            ?>  <tr>
                    <td><?=$sonuc["id"]?></td>
                      <td><?=$sonuc["baslik"]?></td>
          <td><?=$kalan?></td>
                               <td><a class="btn btn-sm btn-success" href="gorev-duzenle?gorevid=<?=$sonuc["id"]?>">Düzenle</a> <a class="btn btn-sm btn-danger" href="sil?gorevid=<?=$sonuc["id"]?>">Sil</a></td>

                     
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