<!DOCTYPE html>


<?php
include"bmcoder/header.php";
include"bmcoder/sidebar.php";
?>
       
        <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
							<h3>Bakiye Ekle</h3>
                            <div class="alert alert-info">Aşağıdan banka hesap bilgilerimizi görebilirsiniz, havale işlemi yaptıktan sonra ödeme bildir butonuna basarak ödeme bildiriniz. Ödeme bildiriminiz yöneticilerimiz tarafından incelenecek ve onaylanacaktır.
</div>
							   <br>
							   
							    

<div class="well">

            
              <p style="text-align: center;">
                <span style="font-size: 36px;">Banka Hesaplarımız</span>
              </p>

              <div class="table-responsive">
                <table class="table table-striped table-bordered table-checkable ">
                  <thead>
                    <tr>
                      <th>Banka Adı</th>
                      <th>Şube Kodu</th>
                      <th>Hesap No</th>
                      <th>IBAN</th>
                      <th>Alıcı Adı</th>

                    </tr>
                  </thead>
                  <tbody>
                     <?php
$sorgu4 = $baglanti->query("SELECT * FROM bankahesap");
	$sorgu4->execute();
            while ($sonuc4 = $sorgu4->fetch()) {   // Sorgulumuzu While ile Döndürüyoruz
    ?>
                    <tr>
                    
                      <td><?=$sonuc4["ad"]?></td>
                      <td><?=$sonuc4["subekod"]?></td>
                                           <td><?=$sonuc4["hesapno"]?></td>
                      <td><?=$sonuc4["iban"]?></td>
                      <td><?=$sonuc4["aliciad"]?></td>

                     <?php     }?>
                          </tr>
                    </tbody>
                  </table>
                </div>
            </div>
            <br>
            <?php
             if($_POST){
                               
                            $banka = $_POST['banka'];
                         
                        $miktar = $_POST['miktar'];    

  $sql = $baglanti->prepare("insert into odemebildir set kullanici=:kullanici,banka=:banka,miktar=:miktar,date=:date,durum=:b");
    $ekle = $sql->execute(array(
    
            'kullanici' => $sonuc2["kullanici"],
			'miktar' =>  $miktar,
			'banka' => $banka,
			'date' => date('d.m.Y H:i:s'),
		'b' => 1,
    ));
    if ($ekle){
        echo'başarılı';
                            }}
                            ?>
       <form method="post">
           <h3>Ödeme Bildirimi</h3>
           <label>Ödemeyi Nereden Gönderdiniz?</label> 
           <select name="banka" class="form-control form-control-line"> 
                     <?php
$sorgu4 = $baglanti->query("SELECT * FROM bankahesap");
	$sorgu4->execute();
            while ($sonuc4 = $sorgu4->fetch()) {   // Sorgulumuzu While ile Döndürüyoruz

                           
                            ?>          

										 <option vaule="<?=$sonuc4["id"]?>"><?=$sonuc4["ad"]?></option>   <?php     }?><br>  </select>    
										 <br><br>
                                           <input name="miktar" class="form-control" placeholder="Gönderdiğiniz Miktar"></input>
                                      <br><br>
                                               
                                            
                                        
							   <button class="btn btn-primary btn-block">Ödeme Bildir</button>
							   </form><br>
							   <a href="bekleyenler" class="btn btn-primary">Geçmiş Ödeme Talepleriniz</a>
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