<!DOCTYPE html>


<?php
include"bmcoder/header.php";
include"bmcoder/sidebar.php";
?>
       
        <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
							<h3>Ödeme Talebi Oluştur
</h3>
<div class="alert alert-info"><b>Merhaba bakiyeniz <?=$sonuc3['odememin']?>TL'ye ulaştığında Para Çek butonu aktif hale gelir.Para çek butonuna bastığınız zaman ödemeniz ödeme tarihleri arasında ödenir.</b></div>

</center>

							  <center><?php
							  $bmcoder = $sonuc3['odememin'] - "0.01";
if($sonuc2["bakiye"] > $bmcoder) {if($_POST)
{
$id = $sonuc2["id"];
$odemehesabi = $sonuc2["odemehesabi"];
if(isset($odemehesabi)) {

}
else{
    echo'<div class="alert alert-danger">Lütfen ödeme hesabı ekleyiniz</div>';
}

	  $sql = $baglanti->prepare("insert into odemetalepleri set kullanici=:kullanici,bakiye=:bakiye,cekimhesabi=:cekimhesabi,date=:date,cekimmethodu=:method, durum=:f");
    $ekle = $sql->execute(array(
       'method' => $sonuc2["odemeyontemi"],	 
            'kullanici' => $sonuc2["kullanici"],
			'bakiye' => $sonuc2["bakiye"],
			'cekimhesabi' => $sonuc2["odemehesabi"],
			'date' => date('d.m.Y H:i:s'),
			'f' => 1,
    ));
    if ($ekle){


    $sonuc = $baglanti->exec("UPDATE kullanicilar SET bakiye = '0'WHERE id = $id");

    if ($sonuc > 0) {
        echo '<div class="alert alert-info">Ödeme Talebiniz Başarıyla Bize Ulaşmıştır.</div>';
    } else {
        echo "Bir Sorun Oluştu Admine Haber Veriniz.";
    }
  }else
        echo "Bir Sorun Oluştu Admine Haber Veriniz.";
}

  

echo'	<form method="POST">

<input class="form-control" placeholder="Bakiyeniz : '.$sonuc2["bakiye"].'" disabled></input><br>
<br><button type="sumbit" name="gonder" class="btn btn-primary ">Para Çek</button></center></form>';

}
else{
echo'<input class="form-control" placeholder="Bakiyeniz : '.$sonuc2["bakiye"].'" disabled></input><br>
<br><button class="btn btn-primary disabled" >Para Çek</button></center>';}

?><br> <div class="well">

              <p style="text-align: center;">
                <span style="font-size: 36px;">Geçmiş Ödemeleriniz</span>
              </p>

              <div class="table-responsive">
                <table class="table table-striped table-bordered table-checkable ">
                  <thead>
                    <tr>
                      <th>Kullanıcı Adı</th>
                      <th>Miktar</th>
                      <th>Durum</th>
                  

                    </tr>
                  </thead>
                  <tbody>
                      <?php
$sorgu4 = $baglanti->query("SELECT * FROM odemetalepleri WHERE kullanici='".$_SESSION["kullanici"]."'");
	$sorgu4->execute();
            while ($sonuc4 = $sorgu4->fetch()) {   // Sorgulumuzu While ile Döndürüyoruz
    ?>
                    <tr>
                    
                      <td><?=$sonuc4["kullanici"]?></td>
                      <td><?=$sonuc4["bakiye"]?></td>
                      <td><?php
                      if($sonuc4["durum"] == 1){
                          echo'Ödeme Bekliyor';
                          }
                             if($sonuc4["durum"] == 2){
                              echo'Ödeme Yapıldı';
                          }
                             if($sonuc4["durum"] == 3){
                                 echo'İptal Edildi';
                             }
                          }?></td>
                   
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
                    </div>
                </div>
	   
	     <?php include"bmcoder/footer.php"?>

</html>