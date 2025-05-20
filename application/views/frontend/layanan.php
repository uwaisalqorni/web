<div class="mt-5 pt-5"></div> 
<main id="main">
	<!-- ======= Services Section ======= -->
	<section id="services" class="services section-bg">
		<div class="container" data-aos="fade-up">

			<header class="section-header">
				<h3>Fasilitas Pelayanan</h3>
				<p>Jenis Fasilitas Pelayanan yang disediakan oleh RSI Gondanglegi</p>
			</header>
			
			<div class="row">
				<?php
					foreach ($layanan as $layanan) :
				?>
					<div class="col-md-6 col-lg-4 wow" data-aos="zoom-in" data-aos-delay="100">
						<div class="box">
							<div class="icon" style="background: #eafde7;"><a href="<?= $layanan['url']; ?>"><i class="<?= $layanan['icon']; ?>" style="color:#41cf2e;"></i></a></div>
							<h4 class="title"><a href="<?= $layanan['url']; ?>"><?= $layanan['nama']; ?></a></h4>
							<p class="description"><?= $layanan['deskripsi']; ?></p>
						</div>
					</div>				
				<?php endforeach; ?>
              	
              		<div class="col-md-6 col-lg-4 wow" data-aos="zoom-in" data-aos-delay="100">
						<div class="box">
							<div class="icon" style="background: #eafde7;"><a href="https://play.google.com/store/apps/details?id=com.rsigondanglegi.apam"><i class="fab fa-android" style="color:#41cf2e;"></i></a></div>
							<h4 class="title"><a href="https://play.google.com/store/apps/details?id=com.rsigondanglegi.apam">Pendaftaran Online</a></h4>
							<p class="description">Pendaftaran Online Via Aplikasi Android yang bisa di unduh di playstore</p>
						</div>
					</div>
              		<div class="col-md-6 col-lg-4 wow" data-aos="zoom-in" data-aos-delay="100">
						<div class="box">
							<div class="icon" style="background: #eafde7;"><a href="http://kamar.rsigondanglegi.co.id"><i class="fas fa-bed" style="color:#41cf2e;"></i></a></div>
							<h4 class="title"><a href="http://kamar.rsigondanglegi.co.id">Info Kamar</a></h4>
							<p class="description">Informasi Kamar dan Jadwal Dokter</p>
						</div>
					</div>
              
              
			</div>
		</div>
	</section><!-- End Services Section -->
</main><!-- End #main -->

 