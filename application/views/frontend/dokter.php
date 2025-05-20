<div class="mt-5 pt-5"></div> 
<main id="main">
    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
		<div class="container" data-aos="fade-up">
			<header class="section-header">
				<h3>Info Dokter RSIG</h3>
				<p>Kami Tim Dokter dokter pada <b><?= $nama ?></b> di RSI Gondanglegi</p>
			</header>
			<div class="row">
				<?php
					foreach ($dokter as $dokter) :
				?>
					<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
						<div class="member">
							<img src="<?= base_url('assets/img/dokter/') . $dokter['image'] ?>" class="img-fluid" alt="">
							<div class="member-info">
								<div class="member-info-content">
									<h4><?= $dokter['dokter']; ?></h4>
									<span><?= $dokter['poliklinik']; ?></span>
                                    <span><?= $dokter['hari']; ?></span>
									<span><?= $dokter['jam']; ?></span>
								</div>
							</div>
						</div>
					</div>			
				<?php endforeach; ?>
			</div>
		</div>
    </section><!-- End Team Section -->
</main><!-- End #main -->

 