<div class="mt-5 pt-5"></div> 
<main id="main">
    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
		<div class="container" data-aos="fade-up">
			<header class="section-header">
				<h3>Penunjang Medis</h3>
			</header>
			<header class="section-header">
				<h4>Penunjang medis / instalasi yang ada di RSI Gondanglegi</h4>
			</header>

			<ul id="faq-list" data-aos="fade-up" data-aos-delay="100">
				<?php
					foreach ($instalasi as $instalasi) :
				?>				
					<li>
						<a data-toggle="collapse" class="collapsed" href="#faq<?= $instalasi['id']; ?>"><?= $instalasi['nama']; ?><i class="fas fa-minus-circle"></i></a>
						<div id="faq<?= $instalasi['id']; ?>" class="collapse" data-parent="#faq-list">
							<p><?= $instalasi['deskripsi']; ?></p>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
    </section><!-- End F.A.Q Section -->

</main><!-- End #main -->

 