<!DOCTYPE html>


<?php
include"bmcoder/header.php";
include"bmcoder/sidebar.php";
?>
       
        <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
							<h3>Banka Hesapları
							
</h3>
<?php
if($_POST){
  $sql = $baglanti->prepare("insert into bankahesap set ad=:banka,subekod=:subekod,hesapno=:hesapno,iban=:iban,aliciad=:aliciad");
    $ekle = $sql->execute(array(
       'banka' => $_POST['banka'],
       'subekod' => $_POST['subekod'],
              'hesapno' => $_POST['hesapno'],
       'iban' => $_POST['iban'],
       'aliciad' => $_POST['aliciad'],

    ));
    if ($ekle){


        echo '<div class="alert alert-success">Banka hesabı başarıyla eklenmiştir .</div>';
    } else {
      
        echo "Bir Sorun Oluştu Admine Haber Veriniz.";
}}
?>
<form method="post">
    <input class="form-control" placeholder="Banka Adı" name="banka"></input><br>
        <input class="form-control" placeholder="Şube Kod" name="subekod"></input><br>
    <input class="form-control" placeholder="Hesap No" name="hesapno"></input><br>
    <input class="form-control" placeholder="IBAN" name="iban"></input><br>
    <input class="form-control" placeholder="Alıcı Adı" name="aliciad"></input><br>

    <button class="btn btn-primary">Hesap Ekle</button>
</form><br><br>

</center>
 <div class="well">

            

          <div class="table-responsive">

                <table class="table table-striped table-bordered table-checkable ">
                  <thead>
                    <tr>
                      <th>id</th>
                                            <th>Banka Adı</th>

                      <th>Şube Kodu</th>
                      
<th>Hesap No</th>
<th>IBAN</th>
<th>Alıcı Adı</th>
<th>İşlem</th>
                    </tr>
                  </thead>
                  <tbody>

						
                      <?php
       $sorgu = $baglanti->query("Select * from bankahesap "); // Sorgumuzu Yazdık
            $sorgu->execute();
            while ($sonuc = $sorgu->fetch()) {
        
            ?>  <tr>
                    <td><?=$sonuc["id"]?></td>
                      <td><?=$sonuc["ad"]?></td>
          <td><?=$sonuc['subekod']?></td>
                                <td><?=$sonuc["hesapno"]?></td>
                      <td><?=$sonuc["iban"]?></td>
                      <td><?=$sonuc["aliciad"]?></td>

                      <td> <a class="btn btn-sm btn-danger" href="bnksil?id=<?=$sonuc["id"]?>">Sil</a></td>

                             

                     
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