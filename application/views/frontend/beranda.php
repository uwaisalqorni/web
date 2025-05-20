<!-- ======= Hero Section ======= -->
<section id="hero" class="clearfix">
    <div class="container d-flex h-100">
		<div class="row justify-content-center align-self-center" data-aos="fade-up">
			<div class="col-md-6 intro-info order-md-first order-last" data-aos="zoom-in" data-aos-delay="100">
				<h2>BERKHIDMAH UNTUK UMAT</h2>
				<div>
					<a href="#services" class="btn-get-started scrollto">Dapatkan Pelayanan</a>
				</div>
			</div>

			<div class="col-md-6 intro-img order-md-last order-first" data-aos="zoom-out" data-aos-delay="200">
				<img src="<?= base_url('assets/img/intro-img2.png') ?>" alt="" class="img-fluid">
			</div>
		</div>
    </div>
</section><!-- End Hero -->

<main id="main">
	
	<!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details section-bg">
		<div class="container" data-aos="fade-up">
			<div class="portfolio-details-container">
				<div class="owl-carousel portfolio-details-carousel">
					<?php
						foreach ($imageslider as $imageslider) :
					?>
						<img src="<?= base_url('assets/img/imageslider/'). $imageslider['image']; ?>" style="height:700px;" class="img-fluid" alt="">           
					<?php endforeach; ?>
				</div>
			</div>
		</div>
    </section><!-- End Portfolio Details Section -->
	
    <!-- ======= About Section ======= -->
    <section id="about" class="about">

		<div class="container" data-aos="fade-up">
			<div class="row">

				<div class="col-lg-7 col-md-6">
					<div class="about-img" data-aos="fade-right" data-aos-delay="100">
						<img src="<?= base_url('assets/img/umum/'). $profil['image']; ?>" alt="">
					  
					</div>
				</div>

				<div class="col-lg-5 col-md-6">
					<div class="about-content" data-aos="fade-left" data-aos-delay="100">
						<h2><?= $profil['nama']; ?></h2>
						<h3><?= $profil['detail']; ?></h3>
						<ul>
							<li><i class="far fa-check-circle"></i> <?= $profil['deskripsi']; ?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
		<div class="container" data-aos="fade-up">

        <header class="section-header">
			<h3>FASILITAS PELAYANAN</h3>
			<p>Jenis Fasilitas Pelayanan yang disediakan oleh RSI Gondanglegi</p>
        </header>
		
        <div class="row">
			<?php
				foreach ($layanan as $layanan) :
			?>
				<div class="col-md-6 col-lg-4 wow" data-aos="zoom-in" data-aos-delay="100">
					<div class="box">
						<div class="icon" style="background: #eafde7;"><a href="<?= base_url('layanan'); ?>"><i class="<?= $layanan['icon']; ?>" style="color:#41cf2e;"></i></a></div>
						<h4 class="title"><a href="<?= base_url('layanan'); ?>"><?= $layanan['nama']; ?></a></h4>
						<p class="description"><?= $layanan['deskripsi']; ?></p>
					</div>
				</div>				
			<?php endforeach; ?>
        </div>

		</div>

    </section><!-- End Services Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
		<div class="container" data-aos="fade-up">
			<header class="section-header">
				<div class="section-header">
					<h3>POLI KLINIK</h3>
					<p>Kami menyediakan Tim Dokter Spesialis pada poli klinik yang ada di RSI Gondanglegi</p>
				</div>
			</header>
			<div class="row">
				<?php
					foreach ($poliklinik as $poliklinik) :
				?>
					<div class="col-md-6 col-lg-3 wow" data-aos="zoom-in" data-aos-delay="100">
						<div class="box">
							<div class="icon" style="background: #e6fdfc;"><a href="<?= base_url('klinik/dokter/' . $poliklinik['id']); ?>"><i class="<?= $poliklinik['icon']; ?>" style="color:#3fcdc7;"></i></a></div>
							<h4 class="title"><a href="<?= base_url('klinik/dokter/' . $poliklinik['id']); ?>"><?= $poliklinik['nama']; ?></a></h4>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
    </section><!-- End Services Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
		<div class="container" data-aos="fade-up">
			<div class="section-header">
				<h3>DOKTER HARI INI</h3>
				<p>Silahkan konsultasikan keluhan Anda kepada Dokter jaga yang terjadwal hari ini : 
				<b>
				<?php
					setlocale(LC_ALL, 'id-ID', 'id_ID');
					echo strftime("%A, %d %B %Y");
				?>
				</b></p>
			</div>

			<div class="row">
				<?php
					foreach ($dokterhariini as $dokterhariini) :
				?>
					<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
						<div class="member">
							<img src="<?= base_url('assets/img/dokter/'). $dokterhariini['image']; ?>" class="img-fluid" alt="">
							<div class="member-info">
								<div class="member-info-content">
									<h4><?= $dokterhariini['nama']; ?></h4>
									<span><?= $dokterhariini['poliklinik']; ?></span>
									<span><?= $dokterhariini['jam']; ?></span>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
    </section><!-- End Team Section -->
	
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
		<div class="container" data-aos="zoom-in">
			<header class="section-header">
				<h3>TESTIMONI</h3>
			</header>
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="owl-carousel testimonials-carousel">
						<?php
							foreach ($testimoni as $testimoni) :
						?>
							<div class="testimonial-item">
								<img src="<?= base_url('assets/img/blue.png') ?>" class="testimonial-img" alt="">
								<h3><?= $testimoni['nama']; ?></h3>
								<h4><?= $testimoni['deskripsi']; ?></h4>
								<p><?= $testimoni['testimoni']; ?></p>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
		<div class="container" data-aos="zoom-in">
			<header class="section-header">
				<h3>REKANAN KAMI</h3>
			</header>
			<div class="owl-carousel clients-carousel">
				<?php
					foreach ($rekanan as $rekanan) :
				?>
					<img src="<?= base_url('assets/img/rekanan/'). $rekanan['image']; ?>" alt="">           
				<?php endforeach; ?>
			</div>
		</div>
    </section><!-- End Clients Section -->

	<!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container">
        <div class="row counters" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?= $profil['jmldokter']; ?></span>
            <p>Dokter</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?= $profil['jmlperawat']; ?></span>
            <p>Perawat</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?= $profil['jmlkaryawan']; ?></span>
            <p>Karyawan</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?= $profil['jmlpasien']; ?></span>
            <p>Pasien</p>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->
	
    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action" class="call-to-action">
      <div class="container" data-aos="zoom-out">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Hubungi Kami</h3>
            <p class="cta-text"> Kami berharap Anda segera menghubungi kami apabila ada keluhan kesehatan untuk segera mendapatkan pelayana kami.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="<?= base_url('kami/kontak'); ?>">Hubungi Sekarang</a>
          </div>
        </div>

      </div>
    </section><!--  End Call To Action Section -->

	
</main><!-- End #main -->

 