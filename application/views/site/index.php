<!DOCTYPE html>
<html lang="en">
<style>
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <title>Pinandu LLDIKTI XI</title>
<!--

ART FACTORY

https://templatemo.com/tm-537-art-factory

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/assets_home/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/assets_home/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/assets_home/css/templatemo-art-factory.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/assets_home/css/owl-carousel.css">

    </head>
    
    <body>
    
    
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">PINANDU LLDIKTI XI</a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            
                            <li class="scroll-to-section"><a href="https://lapor.go.id">SP4N-LAPOR</a></li>
                            <li class="scroll-to-section"><a href="https:/lldikti11.kemdikbud.go.id/pengaduan" target="blank">Pengaduan dan Konsultasi</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Pelayanan Online</a>
                                <ul>
                                    <li><a href="<?= base_url('umum'); ?>">Umum</a></li>
                                    <li><a href="<?= base_url('pts'); ?>">PTS</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="#contact-us">Hubungi Kami</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->


    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                        <h1>Aplikasi Unit Layanan Terpadu</h1>
                        <p>Selamat datang di Aplikasi Unit Layanan Terpadu Lembaga Layanan Pendidikan TInggi Wilayah XI Kalimantan. Anda dapat melakukan pengaduan, konsultasi dan pelayanan secara online</p>
                       
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                        <img src="<?= base_url();?>/assets_home/images/logo.png" class="rounded img-fluid d-block mx-auto" alt="First Vector Graphic">
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->

    <section class="section" id="about2">
        <div class="container">
            <div class="row">
                <div class="left-text col-lg-8 col-md-12 col-sm-12 mobile-bottom-fix">
                    
                    <ul>
                        <li>
                            <img src="<?= base_url();?>/assets_home/images/lapor.png" alt="">
                            <div class="text">
                                <h6>Sistem Pengelolaan Pengaduan Publik Nasional Layanan Aspirasi Pengaduan Online Rakyat (SP4N-LAPOR!)</h6>
                                Layanan penyampaian semua aspirasi dan pengaduan rakyat secara online yang terintegrasi<br />
                                <a class="btn btn-info" href="https:/lapor.go.id" target="blank"> Kunjungi</a>
                            </div>
                        </li>
                        <li>
                   <img src="<?= base_url();?>/assets_home/images/cs.png" alt=""></a>
                            <div class="text">
                                <h6>Pengaduan dan Konsultasi Online LLDIKTI XI</h6>
                                Anda dapat berkonsultasi dan melakukan pengaduan langsung ke LLDIKTI XI secara online <br />
                                <a class="btn btn-info" href="https:/lldikti11.kemdikbud.go.id/pengaduan" target="blank"> Kunjungi</a>
                            </div>
                        </li>
                        <li>
                            <img src="<?= base_url();?>/assets_home/images/layanan.png" alt="">
                            <div class="text">
                                <h6>Pinandu LLDIKTI XI</h6>
                                Aplikasi Unit layanan Terpadu, pada layanan ini anda dapat melakukan pelayanan secara online.<br />
                                <div class="dropdown">
  <button class="btn btn-info">Pilih Jenis Pelayanan</button>
  <div class="dropdown-content">
    <a href="<?= base_url('umum'); ?>" target="blank">Umum</a>
    <a href="<?= base_url('pts'); ?>" target="blank">PTS</a>
  </div>
</div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="right-image col-lg-4 col-md-12 col-sm-12 mobile-bottom-fix-big" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <img src="<?= base_url();?>/assets_home/images/right-image.png" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
            </div>
        </div>
    </section>
  





    <!-- ***** Contact Us Start ***** -->
    <section class="section" id="contact-us">
        <div class="container-fluid">
            <div class="row">
                <!-- ***** Contact Map Start ***** -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div id="map">
                      <!-- How to change your own map point
                           1. Go to Google Maps
                           2. Click on your location point
                           3. Click "Share" and choose "Embed map" tab
                           4. Copy only URL and paste it within the src="" field below
                    -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d592.1132107072099!2d114.59436206842705!3d-3.2888697132646203!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54445063df59733%3A0xc601f8b407f8c2de!2sLembaga%20Layanan%20Pendidikan%20Tinggi%20(LLDIKTI)%20Wilayah%20XI%20Kalimantan!5e0!3m2!1sid!2sid!4v1683789017612!5m2!1sid!2sid" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <!-- ***** Contact Map End ***** -->

                <!-- ***** Contact Form Start ***** -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="contact-form">
                    <img src="<?= base_url();?>/assets_home/images/logofooter.png" height="200">
                         <center>
                          <font color="white"> Lembaga Layanan Pendidikan Tinggi Wilayah XI Kalimantan <br />
                           
                            Jl. Adhyaksa No.1 Banjarmasin 70123
Kalimantan Selatan
                            
                            Telpon : 0511-3304583 / 0511-3304477
Fax : 0511-3304417 / 0511-3304002
Email : tu.lldikti11@kemdikbud.go.id</font> 
</center>
                            
                          </div>
                      
                    </div>
                </div>
                <!-- ***** Contact Form End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Contact Us End ***** -->

    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <p class="copyright">Copyright &copy; 2023 PINANDU LLDIKTI XI
                
    </p>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    <ul class="social">
                        <li><a href="https://www.facebook.com/lldikti11/"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="mailto:tu.lldikti11@kemdikbud.go.id"><i class="fa fa-envelope"></i></a></li>
                        <li><a href="https://www.instagram.com/lldikti_11/"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="https://www.youtube.com/@HumasLLDIKTIWilayahXI"><i class="fa fa-youtube"></i></a></li>
                       
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- jQuery -->
    <script src="<?= base_url();?>/assets_home/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="<?= base_url();?>/assets_home/js/popper.js"></script>
    <script src="<?= base_url();?>/assets_home/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="<?= base_url();?>/assets_home/js/owl-carousel.js"></script>
    <script src="<?= base_url();?>/assets_home/js/scrollreveal.min.js"></script>
    <script src="<?= base_url();?>/assets_home/js/waypoints.min.js"></script>
    <script src="<?= base_url();?>/assets_home/js/jquery.counterup.min.js"></script>
    <script src="<?= base_url();?>/assets_home/js/imgfix.min.js"></script> 
    
    <!-- Global Init -->
    <script src="<?= base_url();?>/assets_home/js/custom.js"></script>

  </body>
</html>