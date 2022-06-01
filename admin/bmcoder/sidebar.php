<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
           
          </ul>
        </form>
          
        <ul class="navbar-nav navbar-right">
         
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Bildirimler
               
              </div>
             
        <div class="dropdown-list-content dropdown-list-icons">     <?php
                 $sorgu12 = $baglanti->prepare("Select * from bildirimler"); // Sorgumuzu Yazdık
            $sorgu12->execute();
            while ($sonuc12 = $sorgu12->fetch()) {  
                ?> 
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white"> 
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
<?=$sonuc12['yazi']?>                    <div class="time text-primary"><?=$sonuc12['tarih']?></div>
                  </div>
                </a>
       <?php    }  ?>
              </div>
          
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?php echo"https://"; echo$_SERVER['SERVER_NAME'];
  echo'/panel/assets/img/avatar/avatar-1.png"';?> class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Merhaba, <?=$sonuc2['kullanici']?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="adminayar" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profilim
              </a>
             
              <div class="dropdown-divider"></div>
              <a href="cikis.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Çıkış Yap
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#"><?=$sonuc3['sitename']?></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#"><?=$sonuc3['kisa']?></a>
          </div>
          <ul class="sidebar-menu">
              <li class="nav-item dropdown">
               <a class="beep beep-sidebar" href="index"><i class="fa fa-home"></i> <span>Anasayfa</span></a></li>
              
          <li>               <a class="nav-link" href="gorevler"><i class="fa fa-credit-card"></i> <span>Görevler</span></a></li>
          
              
                    
                       
                        <li> <a class="waves-effect waves-dark" href="gorev-yayinla" aria-expanded="false"><i class="fa fa-plus"></i><span class="hide-menu">Görev Yayınla</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="gorev-talep" aria-expanded="false"><i class="fa fa-check"></i><span class="hide-menu">Görev Talepleri</span></a>
                        </li>
						 <li> <a class="waves-effect waves-dark" href="bakiye-talep" aria-expanded="false"><i class="fa fa-money"></i><span class="hide-menu">Ödeme Talepleri</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="paracek" aria-expanded="false"><i class="fa fa-heart"></i><span class="hide-menu">Para Çekme Talepleri </span></a>
                        </li>
                             <li> <a class="waves-effect waves-dark" href="uyeler" aria-expanded="false"><i class="fa fa-user-plus"></i><span class="hide-menu">Üyeler</span></a>
                        </li>
                          <li> <a class="waves-effect waves-dark" href="bildirim" aria-expanded="false"><i class="far fa-bell"></i><span class="hide-menu">Bildirim Ayarları</span></a>
                        </li>
                         <li> <a class="waves-effect waves-dark" href="banka" aria-expanded="false"><i class="fa fa-bank"></i><span class="hide-menu">Banka Ayarları</span></a>
                        </li>
                          <li> <a class="waves-effect waves-dark" href="adminayar" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Admin Ayarları</span></a>
                        </li>
						 <li> <a class="waves-effect waves-dark" href="siteayar" aria-expanded="false"><i class="fa fa-cog"></i><span class="hide-menu">Site Ayarları</span></a>
                        </li>
                        	 <li> <a class="waves-effect waves-dark" href="cikis" aria-expanded="false"><i class="fas fa-sign-out-alt"></i><span class="hide-menu">Çıkış Yap</span></a>
                        </li>


          
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title"> <?=$sonuc3['sitename']?>
                    <div class="dropdown d-inline">
                   Görev Yap Para Kazan
                      
                    </div>
                  </div>
               
            </div>
          </div>