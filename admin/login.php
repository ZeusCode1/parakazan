<!doctype HTML>
<?php
include("bmcoder/fonk.php"); //veri tabanına bağlandık 
$sorgu2 = $baglanti->prepare("SELECT * FROM siteayar");
	$sorgu2->execute();
    $sonuc2 = $sorgu2->fetch();//sorgu çalıştırılıp veriler alınıyor
    ?><!DOCTYPE html>
<head>
	<title><?=$sonuc2['sitename']?> - Admin Girişi</title>
	    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo"https://"; echo$_SERVER['SERVER_NAME'];
  echo'/panel/node_modules/bootstrap/dist/css/bootstrap.min.css">';?>
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-deep_purple.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link href="<?php echo"https://"; echo$_SERVER['SERVER_NAME'];
  echo'/panel/fonts/fontello/css/fontello.css" rel="stylesheet" />';?>
    <link rel="stylesheet" href="<?php echo"https://"; echo$_SERVER['SERVER_NAME'];
  echo'/panel/css/bootstrap-offset-right.css">';?>
    <link rel="stylesheet" href="<?php echo"https://"; echo$_SERVER['SERVER_NAME'];
  echo'/panel/css/stylelogin.css">';?>
    <style>
        .mdl-textfield__label {
            margin-bottom: 0;
            color: #d7dbdc;
            font-weight: normal;
        }
        
        .mdl-textfield--floating-label.is-focused .mdl-textfield__label,
        .mdl-textfield--floating-label.is-dirty .mdl-textfield__label {
            text-transform: uppercase
        }
        
        .has-feedback label~.form-control-feedback {
            top: 15px;
        }
        
        .mdl-textfield {
            width: 100%;
        }
        
        .mdl-checkbox__label {
            cursor: text;
            font-size: 13px;
            float: left;
            color: #b0b3b4;
            font-weight: normal;
        }
        
        .mdl-checkbox__box-outline {
            border: 1px solid #b0b3b4;
        }
        
        .mdl-textfield__input {
            border: none;
            border-bottom: 1px solid rgba(0, 0, 0, .12);
            display: block;
            font-size: 16px;
            margin: 0;
            padding: 4px 0;
            width: 100%;
            background: 0 0;
            text-align: left;
            color: inherit;
            font-weight: bold;
        }
        
        .mdl-switch__label {
            float: left;
            font-weight: normal;
            color: #b0b3b4;
            font-size: 14px;
        }
    </style>
</head>
	<?php
session_start(); //oturum başlattık

//eğer mevcut oturum varsa sayfayı yönlendiriyoruz.
if (isset($_SESSION["Oturum"]) && $_SESSION["Oturum"] == "56789") {
    header("location:index.php");
} //eğer önceden beni hatırla işaretlenmiş ise oturum oluşturup sayfayı yönlendiriyoruz.
else if (isset($_COOKIE["cerez"])) {
    //Kullanıcı adlarını çeken sorgumuz

    $sorgu = $baglanti->prepare("select kullanici from admin");
    $sorgu->execute();


    //Kullanıcı adlarını döngü yardımı ile tek tek elde ediyoruz
    while ($sonuc = $sorgu->fetch()) {
        //eğer bizim belirlediğimiz yapıya uygun kullanıcı var mı diye bakıyoruz.
        if ($_COOKIE["cerez"] == md5("aa" . $sonuc['kullanici'] . "bb")) {

            //oturum oluşturma buradaki değerleri güvenlik açısından
            //farklı değerler yapabilirsiniz
            //aynı zamanda kullanıcı adınıda burada tuttum
            $_SESSION["Oturum"] = "56789";
            $_SESSION["kullanici"] = $sonuc['kullanici'];

            //sonrasında index sayfasına yönlendiriyorum
            header("location:index.php");
        }
    }
}
//Giriş formu doldurulmuşsa kontrol ediyoruz
if ($_POST) {
    $txtkullanici = $_POST["txtkullanici"]; //Kullanıcı adını değişkene atadık
    $txtParola = $_POST["txtParola"]; //Parolayı değişkene atadık
}
?>
<body>
    <div class="container">
        <div class="center-block">
            <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-12 col-xs-12 no-padding" style="z-index:1">
                <!-- Slider -->


            </div>
            <!-- Login -->

            <div class="col-lg-12 col-lg-offset-right-1 col-md-6 col-md-offset-right-1 col-sm-12 col-xs-12 no-padding">
                <div class="mlt-content">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#register" data-toggle="tab">Giriş Yap</a></li>
                     
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade in active" id="register">
                           <br> <b><h3>Admin Girişi</h3></b>
                                <?php
                        //Post varsa yani submit yapılmışsa veri tabanından kontrolü yapıyoruz.
                        if ($_POST) {
                            //sorguda kullanıcı adını alıp ona karşılık parola var mı diye bakıyoruz.
                            $sorgu = $baglanti->prepare("select parola from admin where kullanici=:kullanici");
                            $sorgu->execute(array('kullanici' => htmlspecialchars($txtkullanici)));
                            $sonuc = $sorgu->fetch();//sorgu çalıştırılıp veriler alınıyor


                            //parolaları md5 ile şifreledim ve başına sonuna kendimce eklemeler yaptım.
                            if (md5("56" . $txtParola . "23") == $sonuc["parola"]) {
                                $_SESSION["Oturum"] = "56789"; //oturum oluşturma
                                $_SESSION["kullanici"] = $txtkullanici;

                                //eğer beni hatırla seçilmiş ise cookie oluşturuyoruz.
                                //cookie de şifreleyerek kullanıcı adından oluşturdum
                                if (isset($_POST["ckbHatirla"])) {
                                    setcookie("cerez", md5("aa" . $txtkullanici . "bb"), time() + (60 * 60 * 24 * 7));
                                }
                                echo'<div class="alert alert-success">Giriş Başarılı Yönlendiriliyorsunuz</div><meta http-equiv="refresh" content="1;URL=index.php">';

                                header("location:index.php"); //sayfa yönlendirme
                            } else {
                                //eğer kullanıcı adı ve parola doğru girilmemiş ise
                                //hata mesajı verdiriyoruz
                                echo '<div class="alert alert-danger">Kullanıcı adı veya parola yanlış!</div>';
                            }
                        }
                        ?>

                            <form method="post" form data-feedback='{"success": "fa-check", "error": "fa-times"}'>
                                <div class="col-lg-10 col-lg-offset-1 col-lg-offset-right-1 col-md-10 col-md-offset-1 col-md-offset-right-1 col-sm-12 col-xs-12 pull-right ">

                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-group has-feedback">
                                        <input type="text" name="txtkullanici"   id="inputkullanici" class="mdl-textfield__input" />
                                        <label class="mdl-textfield__label " for="fullName ">Kullanıcı Adı</label>
                                        <span class="form-control-feedback" aria-hidden="true" id="fname1"></span>
                                    </div>
                                    
                                

                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                                        <input class="mdl-textfield__input type="password" type="password" name="txtParola" id="inputPassword">
                                        <label class="mdl-textfield__label " for="SetPassword ">Şifre</label>
                                    </div>

                                  
                                    <button class="btn lt-register-btn " type="submit"  ID="btnGiris" value="Giriş" >Giriş Yap<i class="icon-right pull-right "></i></button>
                                </div>
                            </form>
                      
                        </div>
                      
                        </div>
                    </div>
                </div>
                <!--Login-->
            </div>
            <!--center-block-->
        </div>
        <!--container-->
    </div>







    <script src="<?php echo"https://"; echo$_SERVER['SERVER_NAME'];
  echo'/panel/node_modules/jquery/dist/jquery.min.js "></script>';?>
    <script src="<?php echo"https://"; echo$_SERVER['SERVER_NAME'];
  echo'/panel/node_modules/bootstrap/dist/js/bootstrap.min.js "></script>';?>
    <script src="<?php echo"https://"; echo$_SERVER['SERVER_NAME'];
  echo'/panel/libs/mdl/material.min.js "></script>';?>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js "></script>

    <script>
        //Google analytics.
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-79865537-1', 'auto');
        ga('send', 'pageview');
    </script>

    <script>
        //Form validation.
        $('form').validate({
            rules: {
                fname: {
                    minlength: 3,
                    maxlength: 15,
                }
            },
            errorPlacement: function(error, element) {},
            highlight: function(element) {
                var id_attr = "#" + $(element).attr("id") + "1";
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                $(id_attr).removeClass('icon-ok-circled2').addClass('icon-cancel-circled2');
            },
            unhighlight: function(element) {
                var id_attr = "#" + $(element).attr("id") + "1";
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                $(id_attr).removeClass('icon-cancel-circled2').addClass('icon-ok-circled2');
            },
        });
    </script>

</body>

</html>