<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>RSI Gondanglegi</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url('assets/img/favicon.png') ?>" rel="icon">
  <link href="<?php echo base_url('assets/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/vendor/venobox/venobox.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/owl.carousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/vendor/aos/aos.css') ?>" rel="stylesheet">

  

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Rapid - v2.2.0
  * Template URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-end fixed-top topbar-transparent">
    <div class="container d-flex justify-content-end">
      <div class="social-links">
        <a href="" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="" class="linkedin"><i class="fa fa-linkedin"></i></a>
        <a href="" class="instagram"><i class="fa fa-instagram"></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center">

	  <!-- <h1 class="logo mr-auto"><a href="#">RSI GONDANGLEGI</a></h1>  -->
      <!-- Uncomment below if you prefer to use an image logo -->
	  <!--<a href="#" class="logo mr-auto"><img src="<?php echo base_url('assets/img/logo.png') ?>" alt="" class="img-fluid"></a> -->
		
	  <a href="<?= base_url();?>" class="logo mr-auto"><img src="<?php echo base_url('assets/img/logo.png') ?>" alt="" class="img-fluid"></a>
	
      <nav class="main-nav d-none d-lg-block">
        <ul>
			<?php if ($title == "Beranda") : ?>
				<li class="active"><a href="<?= base_url(''); ?>">Beranda</a></li>
			<?php else : ?>
				<li><a href="<?= base_url(''); ?>">Beranda</a></li>
			<?php endif; ?>
			
			<?php if ($title == "Sejarah" || $title == "Visi Misi" || $title == "Direksi" || $title == "Kontak Kami") : ?>
				<li class="drop-down active"><a href="<?= base_url('kami/sejarah'); ?>">Tentang Kami</a>
			<?php else : ?>
				<li class="drop-down"><a href="<?= base_url('kami/sejarah'); ?>">Tentang Kami</a>
			<?php endif; ?>
			
				<ul>
					<?php if ($title == "Sejarah") : ?>
						<li class="active"><a href="<?= base_url('kami/sejarah'); ?>">Sejarah</a></li>
					<?php else : ?>
						<li><a href="<?= base_url('kami/sejarah'); ?>">Sejarah</a></li>
					<?php endif; ?>
					<?php if ($title == "Visi Misi") : ?>
						<li class="active"><a href="<?= base_url('kami/visimisi'); ?>">Visi Misi</a></li>
					<?php else : ?>
						<li><a href="<?= base_url('kami/visimisi'); ?>">Visi Misi</a></li>
					<?php endif; ?>
					<?php if ($title == "Direksi") : ?>
						<li class="active"><a href="<?= base_url('kami/direksi'); ?>">Direksi</a></li>
					<?php else : ?>
						<li><a href="<?= base_url('kami/direksi'); ?>">Direksi</a></li>
					<?php endif; ?>
					<?php if ($title == "Kontak Kami") : ?>
						<li class="active"><a href="<?= base_url('kami/kontak'); ?>">Kontak Kami</a></li>
					<?php else : ?>
						<li><a href="<?= base_url('kami/kontak'); ?>">Kontak Kami</a></li>
					<?php endif; ?>
				</ul>
			</li>
			<?php if ($title == "Layanan") : ?>
				<li class="active"><a href="<?= base_url('layanan'); ?>">Layanan</a></li>
			<?php else : ?>
				<li><a href="<?= base_url('layanan'); ?>">Layanan</a></li>
			<?php endif; ?>
		  
		  <li><a href="<?= base_url('klinik'); ?>">Dokter</a></li>
			<li><a href="<?= base_url(''); ?>">Fasilitas Kamar</a></li>
          <li><a href="<?= base_url('mutu'); ?>">Mutu</a></li>
          
          <li class="drop-down"><a href="">Informasi</a>
            <ul>
              <li><a href="#">Artikel Kesehatan</a></li>
              <li><a href="#">Informasi Umum</a></li>
              <li><a href="#">Testimoni</a></li>
              <li class="drop-down"><a href="#">Rekanan</a>
                <ul>
                  <li><a href="#">Asuransi</a></li>
                  <li><a href="#">Non Asuransi</a></li>
                </ul>
              </li>
			  <li class="drop-down"><a href="">Referensi PPA</a>
                <ul>
                  <li><a href="http://mki-ojs.idionline.org/">mki-ojs.idionline</a></li>
                  <li><a href="https://www.sciencemag.org/">sciencemag.org</a></li>
                  <li><a href="http://www.paediatricaindonesiana.org/">aediatricaindonesiana.org</a></li>
                </ul>
              </li>
			  <li class="drop-down"><a href="">Referensi Pendidikan</a>
                <ul>
                  <li><a href="https://jurnal.ugm.ac.id/jpki/index">jurnal.ugm.ac.id</a></li>
                  <li><a href="https://www.jurnal-doc.com/jurnal-kepuasan-pasien-terhadap-pelayanan-kesehatan-pdf-terbaru/">jurnal-doc</a></li>
                </ul>
              </li>
              <li class="drop-down"><a href="">Referensi Penelitian</a>
                <ul>
                  <li><a href="http://journal.ui.ac.id/index.php/eJKI/index">journal.ui.ac.id</a></li>
                </ul>
              </li>
			  <li class="drop-down"><a href="">Referensi Manajemen</a>
                <ul>
                  <li><a href="http://www.kemnaker.go.id/">kemnaker.go.id</a></li>
                  <li><a href="https://ijazah.ristekdikti.go.id/">ijazah.ristekdikti.go.id</a></li>
                  <li><a href="https://forlap.ristekdikti.go.id/mahasiswa">ristekdikti.go.id</a></li>
                  <li><a href="http://www.kki.go.id/cekdokter/form">kki.go.id</a></li>
                  <li><a href="https://mtki.kemkes.go.id/index.php/cek_status">mtki.kemkes.go.id</a></li>
                </ul>
              </li>
            </ul>
          </li>
		  <li class="drop-down"><a href="<?= base_url('foto'); ?>">Galery</a>
			<ul>
			  <li><a href="<?= base_url('foto'); ?>">Foto</a></li>
              <li><a href="<?= base_url('video'); ?>">Video</a></li>
            </ul>
          </li>
		  <li><a href="<?= base_url('foto2'); ?>">Pengaduan</a></li>
        </ul>
      </nav><!-- .main-nav-->
			
    </div>
  </header><!-- End Header -->

  