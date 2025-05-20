<div class="mt-5 pt-5"></div> 
<main id="main">
    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
		<div class="container" data-aos="fade-up">
			<header class="section-header">
				<h3>Info Kamar</h3>
				<p>Kami Menyediakan Fasilatas Kamar di RSI Gondanglegi</p>
			</header>
			<div class="row">
				<?php
					foreach ($kamar as $kamar) :
				?>
					<div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
						<div class="member">
							<img src="<?= base_url('assets/img/dokter/') . $kamar['image'] ?>" class="img-fluid" alt="">
							<div class="member-info">
								<div class="member-info-content">
									<h4><?= $kamar['dokter']; ?></h4>
									<span><?= $kamar['poliklinik']; ?></span>
                                    <span><?= $kamar['hari']; ?></span>
									<span><?= $kamar['jam']; ?></span>
								</div>
							</div>
						</div>
					</div>			
				<?php endforeach; ?>
			</div>
		</div>
    </section><!-- End Team Section -->
</main><!-- End #main -->
