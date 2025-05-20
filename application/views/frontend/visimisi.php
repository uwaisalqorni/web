<div class="mt-5 pt-5"></div> 
 
<main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
		<div class="container-fluid" data-aos="fade-up">
			<header class="section-header">
				<h3>VISI, MISI & MOTTO</h3>
				<p><?= $visimisi['judul']; ?></p>
			</header>
			<div class="row">
				<div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
					<div class="why-us-img">
						<img src="<?= base_url('assets/img/visimisi/'). $visimisi['image']; ?>" alt="" class="img-fluid">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="why-us-content">
						<div class="features clearfix" data-aos="fade-up" data-aos-delay="100">
							<i class="far fa-gem" style="color: #f058dc;"></i>
							<h4>VISI</h4>
							<p><?= $visimisi['visi']; ?></p>
						</div>
						<div class="features clearfix" data-aos="fade-up" data-aos-delay="200">
							<i class="fa fa-object-group" style="color: #ffb774;"></i>
							<h4>MISI</h4>
							<p><?= $visimisi['misi']; ?></p>
						</div>
						<div class="features clearfix" data-aos="fade-up" data-aos-delay="300">
							<i class="fa fa-language" style="color: #589af1;"></i>
							<h4>Motto</h4>
							<p><?= $visimisi['motto']; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section><!-- End Why Us Section -->


</main><!-- End #main -->

 