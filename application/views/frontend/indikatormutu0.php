<div class="mt-5 pt-5"></div> 
<main id="main">
    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing wow fadeInUp">
		<div class="container" data-aos="fade-up">
			<header class="section-header">
				<h3>INDIKATOR MUTU RUMAH SAKIT</h3>
	
			</header>
			<div class="row flex-items-xs-middle flex-items-xs-center">
				<?php
					foreach ($indikatormutu as $indikatormutu) :
				?>
					<div class="col-xs-6 col-lg-6 pb-4" data-aos="fade-up" data-aos-delay="100">
						<div class="card">
							<div class="card-block">
								<h4 class="card-title"><?= $indikatormutu['nama']; ?></h4>
								<ul class="list-group">
									<li class="list-group-item"><?= $indikatormutu['deskripsi']; ?></li>
									<li class="list-group-item"><?= $indikatormutu['periode']; ?></li>
								</ul>
								<a href="#" class="btn">DETAIL</a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
    </section><!-- End Pricing Section -->
</main><!-- End #main -->

 