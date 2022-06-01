<!DOCTYPE html>


<?php
include"bmcoder/header.php";
include"bmcoder/sidebar.php";
?>
       
        <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
							<h3>Üyeler
</h3>


</center>
 <div class="well">

            

          <div class="table-responsive">

                <table class="table table-striped table-bordered table-checkable ">
                  <thead>
                    <tr>
                      <th>Kullanıcı</th>
                                            <th>İsim</th>

                      <th>Mail</th>
                      <th>Telefon</th>
                                            <th>Bakiye</th>

                                            <th>Ödeme Methodu</th>
                                                                  <th>Ödeme Hesabı</th>
                                                                  <th>Düzenle</th>



                    </tr>
                  </thead>
                  <tbody>

						
                      <?php
       $sorgu = $baglanti->query("Select * from kullanicilar "); // Sorgumuzu Yazdık
            $sorgu->execute();
            while ($sonuc = $sorgu->fetch()) {
        
            ?>  <tr>
                    <td><?=$sonuc["kullanici"]?></td>
                      <td><?=$sonuc["isim"]?></td>
          <td><?=$sonuc['email']?></td>
                   <td><?=$sonuc['tel']?></td>
          <td><?=$sonuc['bakiye']?></td>
          <td><?=$sonuc['odemeyontemi']?></td>
          <td><?=$sonuc['odemehesabi']?></td>
                               <td><a class="btn btn-sm btn-success" href="user-duzenle?userid=<?=$sonuc["id"]?>">Düzenle</a> </td>

                             

                     
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