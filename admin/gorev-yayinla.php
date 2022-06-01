<!DOCTYPE html>


<?php
include"bmcoder/header.php";

include"bmcoder/sidebar.php";
?>
       
        <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
							<h3>Görev Yayınla
</h3>


							  <center><?php
{if($_POST)
{
$id = $sonuc2["id"];
$bm = $_POST['sayi'];

$adet = $sonuc3['gorevadetucret'];
        $bmc = $bm * $adet ;
        
    
                                      if ($_FILES["resim"]["size"]<1024*1024){//Dosya boyutu 1Mb tan az olsun
      $uret=array("as","rt","ty","yu","fg");
            $uzanti=substr($dosya_adi,-4,4);
            $sayi_tut=rand(1,10000);
 
            $yeni_ad="img/gorev/".$uret[rand(0,4)].$sayi_tut.$uzanti;
 
            //Dosya yeni adıyla uploadklasorune kaydedilecek
 
            if (move_uploaded_file($_FILES["resim"]["tmp_name"],$yeni_ad)){
             
            }}
              	  $sql = $baglanti->prepare("insert into gorevler set baslik=:baslik,ucret=:ucret,aciklama=:aciklama,link=:link,durum=:b,resimurl=:resimurl,yayinlayan=:kullanici,sayi=:sayi,kalan=:sayi2");
    $ekle = $sql->execute(array(
       'baslik' => $_POST['baslik'],
            'kullanici' => $sonuc2["kullanici"],
			'aciklama' => $_POST['aciklama'],
			'link' => $_POST['link'],
			'resimurl' => $yeni_ad ,
			'sayi' => $_POST['sayi'],
				'sayi2' => 1,
			'b' => 1,
			'ucret' =>  $adet,
    ));
    if ($ekle){


        echo '<div class="alert alert-info">Göreviniz başarıyla eklenmiştir görevlerim kısmından takip edebilirsiniz.</div>';
    } else {
      
        echo "Bir Sorun Oluştu Admine Haber Veriniz.";
}
}



echo'		<form method="POST" enctype="multipart/form-data">
<input class="form-control" style="text-align: center" name="baslik" placeholder="Görev Başlığı" required></input><br><br>
<input class="form-control" style="text-align: center" name="aciklama" placeholder="Görev Açıklaması" required></input><br><br>

<input class="form-control" type="url" style="text-align: center" name="link" placeholder="Görev Adresi" ></input><br>
<label>Görev Resimi : </label>
<input type="file" name="resim"/><br><br>
<input class="form-control col-12" type="number" style="text-align: center" name="sayi" id="sayi1" placeholder="Görev Adeti" required>
<input type="button" class="btn btn-primary " value="Ücret Hesapla" id="carp" onclick="carpma()" />
<script type="text/javascript">
 function carpma() {
            var deger1 = parseInt(document.getElementById("sayi1").value);
            var deger2 = '.$sonuc3['gorevsatadet'].';
            document.getElementById("sonuc").value = deger1 * deger2;
        }
</script><br></center>
<b>Fiyat</b>
<input class="form-control" type="text" id="sonuc" disabled/><br><br>


<br><button type="sumbit" name="gonder" class="btn btn-primary ">Görev Yayınla</button></center></form>';


}

?>
                            </div>
                        </div>   </div> 
                        </div>
                        </div>
                    </div>
                </div>
	   
	     <?php include"bmcoder/footer.php"?>

</html>