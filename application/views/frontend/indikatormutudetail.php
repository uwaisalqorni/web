<div class="mt-5 pt-5"></div> 
<main id="main">
    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
		<div class="container" data-aos="fade-up">
			<header class="section-header">
				<h3>INDIKATOR MUTU RUMAH SAKIT</h3>
			</header>
			<header class="section-header">
			<h4></h4> 
			</header>
				
			<ul id="faq-list" data-aos="fade-up" data-aos-delay="100">
				<?php
					foreach ($indikatormutu_detail as $indikatormutu_detail) :
				?>				
					<li>
						<a data-toggle="collapse" class="collapsed" href="#faq<?= $indikatormutu_detail['id']; ?>"><b><?= $indikatormutu_detail['nama']; ?></b><i class="fas fa-minus-circle"></i></a>
						<div id="faq<?= $indikatormutu_detail['id']; ?>" class="collapse" data-parent="#faq-list">
							<p><?= $indikatormutu_detail['deskripsi']; ?></p>
							<img src="<?= base_url('assets/img/mutu/'). $indikatormutu_detail['image']; ?>" class="img-fluid" alt="">
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
    </section><!-- End F.A.Q Section -->

</main><!-- End #main -->

 