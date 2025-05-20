<div class="mt-5 pt-5"></div> 
<main id="main">
    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
		<div class="container" data-aos="fade-up">
			<header class="section-header">
				<h3>Fasilitas Umum</h3>
			</header>
			<header class="section-header">
				<h4>Fasilitas Umum yang disediakan oleh RSI Gondanglegi</h4>
			</header>

			<ul id="faq-list" data-aos="fade-up" data-aos-delay="100">
				<?php
					foreach ($fasum as $fasum) :
				?>				
					<li>
						<a data-toggle="collapse" class="collapsed" href="#faq<?= $fasum['id']; ?>"><?= $fasum['nama']; ?><i class="fas fa-minus-circle"></i></a>
						<div id="faq<?= $fasum['id']; ?>" class="collapse" data-parent="#faq-list">
							<p><?= $fasum['deskripsi']; ?></p>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
    </section><!-- End F.A.Q Section -->

</main><!-- End #main --> 

 