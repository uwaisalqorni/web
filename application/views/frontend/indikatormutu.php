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
					foreach ($indikatormutu as $indikatormutu) :
				?>
					<div class="col-md-6 col-lg-6 wow" data-aos="zoom-in" data-aos-delay="100">
						<div class="box">
							<h3 class="title"><a href="mutu/tahun/<?= $indikatormutu['tahun']; ?>">Tahun <?= $indikatormutu['tahun']; ?></a></h3>
						</div>
					</div>				
				<?php endforeach; ?>
			</div>
		</div>
	</section><!-- End Services Section -->
</main><!-- End #main -->

 