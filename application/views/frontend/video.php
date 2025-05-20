<div class="mt-5 pt-5"></div> 
<main id="main">
	<!-- ======= Services Section ======= -->
	<section id="services" class="services section-bg">
		<div class="container" data-aos="fade-up">

			<header class="section-header">
				<h3>Video Galery</h3>
				<p>Beberapa galery video RSI Gondanglegi</p>
			</header>
			
			<div class="row">
				<?php
					foreach ($video as $video) :
				?>
					<div class="col-md-6 col-lg-6 wow" data-aos="zoom-in" data-aos-delay="100">
						<div class="box">
							<h4 class="title"><a href="<?= $video['url']; ?>" target="_blank"><?= $video['nama']; ?></a></h4>
							<div class="embed-responsive embed-responsive-16by9">
								<iframe class="embed-responsive-item" src="<?= $video['embed']; ?>" allowfullscreen></iframe>
							</div>
							<p class="description"><?= $video['deskripsi']; ?></p>
						</div>
					</div>				
				<?php endforeach; ?>
			</div>
		</div>
	</section><!-- End Services Section -->
</main><!-- End #main -->

 