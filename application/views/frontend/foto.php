<div class="mt-5 pt-5"></div> 
<main id="main">
	<!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
		<div class="container" data-aos="fade-up">
			<header class="section-header">
				<h3 class="section-title">Foto Galery</h3>
			</header>

			<div class="row" data-aos="fade-up" data-aos-delay="100">
				<div class="col-lg-12">
					<ul id="portfolio-flters">
						<li data-filter="*" class="filter-active">All</li>
						<?php
							foreach ($kategori as $kategori) :
						?>
							<li data-filter=".filter-<?= $kategori['nama']; ?>"><?= $kategori['nama']; ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>

			<div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
				<?php
					foreach ($foto as $foto) :
				?>
					<div class="col-lg-4 col-md-6 portfolio-item filter-<?= $foto['kategori']; ?>" data-wow-delay="0.2s">
						<div class="portfolio-wrap">
							<img src="<?= base_url('assets/img/foto/') . $foto['image'] ?>" class="img-fluid" alt="">
							<div class="portfolio-info">
								<h4><a href="#"><?= $foto['nama']; ?></a></h4>
								<p><?= $foto['deskripsi']; ?></p>
								<div>
									<a href="<?= base_url('assets/img/foto/') . $foto['image'] ?>" class="link-preview venobox" data-gall="portfolioGallery" title="<?= $foto['nama']; ?>"><i class="fas fa-expand"></i></a>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
    </section><!-- End Portfolio Section -->
</main><!-- End #main -->

 