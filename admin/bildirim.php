<!DOCTYPE html>


<?php
include"bmcoder/header.php";
include"bmcoder/sidebar.php";
?>
       
        <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
							<h3>Bildirimler
							
</h3>
<?php
if($_POST){
  $sql = $baglanti->prepare("insert into bildirimler set yazi=:yazi,tarih=:date");
    $ekle = $sql->execute(array(
       'yazi' => $_POST['yazi'],
       'date' => date("d/m/Y G:i:s"),
    ));
    if ($ekle){


        echo '<div class="alert alert-success">Bildirim başarıyla eklenmiştir .</div>';
    } else {
      
        echo "Bir Sorun Oluştu Admine Haber Veriniz.";
}}
?>
<form method="post">
    <input class="form-control" placeholder="Bildirim" name="yazi"></input><br>
    <button class="btn btn-primary">Bildirim Ekle</button>
</form><br><br>

</center>
 <div class="well">

            

          <div class="table-responsive">

                <table class="table table-striped table-bordered table-checkable ">
                  <thead>
                    <tr>
                      <th>id</th>
                                            <th>Bildirim</th>

                      <th>Tarih</th>
                      

<th>İşlem</th>
                    </tr>
                  </thead>
                  <tbody>

						
                      <?php
       $sorgu = $baglanti->query("Select * from bildirimler "); // Sorgumuzu Yazdık
            $sorgu->execute();
            while ($sonuc = $sorgu->fetch()) {
        
            ?>  <tr>
                    <td><?=$sonuc["id"]?></td>
                      <td><?=$sonuc["yazi"]?></td>
          <td><?=$sonuc['tarih']?></td>
                      <td> <a class="btn btn-sm btn-danger" href="bsil?id=<?=$sonuc["id"]?>">İptal Et</a></td>

                             

                     
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