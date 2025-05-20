<div class="mt-5 pt-5"></div> 
 
<main id="main">

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
		<div class="container" data-aos="fade-up">
			<header class="section-header">
				<h3>SEJARAH</h3>
				<p><?= $sejarah['judul']; ?></p>
			</header>
			<div class="row">
				<div class="col-lg-6 wow fadeInUp order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
					<img src="<?= base_url('assets/img/sejarah/'). $sejarah['image']; ?>" class="img-fluid" alt="">
				</div>
				<div class="col-lg-6 wow fadeInUp pt-4 pt-lg-0 order-2 order-lg-1 text-justify" data-aos="fade-right" data-aos-delay="150">
					<?= $sejarah['deskripsi']; ?>
				</div>
			</div>
		</div>
    </section><!-- End Features Section -->


</main><!-- End #main -->

 