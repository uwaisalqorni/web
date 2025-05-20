<div class="mt-5 pt-5"></div> 
<main id="main">
	<!-- ======= Services Section ======= -->
	<section id="services" class="services section-bg">
		<div class="container" data-aos="fade-up">
			<header class="section-header">
				<h3>INDIKATOR MUTU RUMAH SAKIT</h3>
	<p></p>
			</header>
			
			<div class="row">
				<?php
					foreach ($indikatormutu_tahun as $indikatormutu_tahun) :
				?>
					<div class="col-md-6 col-lg-6 wow" data-aos="zoom-in" data-aos-delay="100">
						<div class="box">
							<h3 class="title"><a href="../detail/<?= $indikatormutu_tahun['id']; ?>"><?= $indikatormutu_tahun['nama']; ?></a></h3>
							<p class="description"><b><?= $indikatormutu_tahun['deskripsi']; ?></b></p>
							<p class="description"><?= $indikatormutu_tahun['periode']; ?></p>
							<p class="description">Tahun : <?= $indikatormutu_tahun['tahun']; ?></p>
							<p class="description"><a href="../detail/<?= $indikatormutu_tahun['id']; ?>">Detail</a></p>
						</div>
					</div>				
				<?php endforeach; ?>
			</div>
		</div>
	</section><!-- End Services Section -->
</main><!-- End #main -->

 