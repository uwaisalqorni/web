<div class="mt-5 pt-5"></div> 
<main id="main">
    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
		<div class="container" data-aos="fade-up">
			<header class="section-header">
				<h3>PELAYANAN</h3>
			</header>
			
			<header class="section-header">
				<h4>Pelayanan yang tersedia di RSI Gondanglegi</h4>
			</header>
				<ul id="faq-list" data-aos="fade-up" data-aos-delay="100">
					<?php
						foreach ($pelayanan1 as $pelayanan1) :
					?>
						<li>
							<a data-toggle="collapse" class="collapsed" href="#faq<?= $pelayanan1['id']; ?>"><?= $pelayanan1['nama']; ?><i class="fas fa-minus-circle"></i></a>
							<div id="faq<?= $pelayanan1['id']; ?>" class="collapse" data-parent="#faq-list">
								<p><?= $pelayanan1['deskripsi']; ?></p>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			
			<header class="section-header mt-5">
				<h4>Pelayanan yang tidak tersedia di RSI Gondanglegi</h4>
			</header>
				<ul id="faq-list" data-aos="fade-up" data-aos-delay="100">
					<?php
						foreach ($pelayanan2 as $pelayanan2) :
					?>
						<li>
							<a data-toggle="collapse" class="collapsed" href="#faq<?= $pelayanan2['id']; ?>"><?= $pelayanan2['nama']; ?><i class="fas fa-minus-circle"></i></a>
							<div id="faq<?= $pelayanan2['id']; ?>" class="collapse" data-parent="#faq-list">
								<p><?= $pelayanan2['deskripsi']; ?></p>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
		</div>
    </section><!-- End F.A.Q Section -->
</main><!-- End #main -->

 