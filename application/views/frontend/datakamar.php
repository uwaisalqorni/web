<div class="mt-5 pt-5"></div> 
<main id="main">
	<!-- ======= Services Section ======= -->
    <section id="services" class="services">
		<div class="container" data-aos="fade-up">

			<header class="section-header">
				<h3>Info Fasilitas Kamar</h3>
				<p>Kami menyediakan Fasilitas Kamar yang ada di RSI Gondanglegi</p>
			</header>
			<div class="row">
				<?php
					foreach ($datakamar as $datakamar) :
				?>
					<div class="col-md-6 col-lg-3 wow" data-aos="zoom-in" data-aos-delay="100">
						<div class="box">
							<div class="icon" style="background: #e6fdfc;"><a href="<?= base_url('kamar/datakamar/') . $poliklinik['id'] ?>"><i class="<?= $poliklinik['icon']; ?>" style="color:#3fcdc7;"></i></a></div>
							<h4 class="title"><a href="<?= base_url('kamar/datakamar/') . $datakamar['id'] ?>"><?= $datakamar['nama']; ?></a></h4>
						</div>
					</div>				
				<?php endforeach; ?>
			</div>
		</div>
    </section><!-- End Services Section -->

</main><!-- End #main -->
