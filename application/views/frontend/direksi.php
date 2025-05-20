<div class="mt-5 pt-5"></div> 
 
<main id="main">

	<!-- ======= Team Section ======= -->
    <section id="team" class="team">
		<div class="container" data-aos="fade-up">
			<div class="section-header">
				<h3>DIREKSI</h3>
				<p>Jajaran Direksi RSI Gondanglegi</p>
			</div>
			<div class="row">
				<?php
					foreach ($direksi as $direksi) :
				?>
				<div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
					<div class="member">
						<img src="<?= base_url('assets/img/direksi/'). $direksi['image']; ?>" class="img-fluid" alt="">
						<div class="member-info">
							<div class="member-info-content">
								<h4><?= $direksi['nama']; ?></h4>
								<span><?= $direksi['jabatan']; ?></span>
								<div class="social">
									<a href=""><i class="fa fa-twitter"></i></a>
									<a href=""><i class="fa fa-facebook"></i></a>
									<a href=""><i class="fa fa-google-plus"></i></a>
									<a href=""><i class="fa fa-linkedin"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
    </section><!-- End Team Section -->


</main><!-- End #main -->

 