<div class="mt-5 pt-5"></div> 
 
<main id="main">
    <!-- ======= contact ======= -->
	<section id="contact" class="contact">
    <div class="contact-top">
		<div class="container-fluid" data-aos="fade-up">
			<header class="section-header">
				<h3>Kontak Kami</h3>
				<p>Dalam upaya untuk meningkatkan kualitas dan kinerja, kami berharap saran dan masukan anda.</p>
			</header>
			<div class="row mb-5">
				<div class="col-lg-8">
					<div>
					  <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15797.284871608097!2d112.6402738!3d-8.1703578!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1e812b89114c8783!2sRumah%20Sakit%20Islam%20Gondanglegi!5e0!3m2!1sen!2sid!4v1597293442761!5m2!1sen!2sid" frameborder="0" allowfullscreen></iframe>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="row">
						<div class="col">
							<div class="contact-links"> 
								<ul>
									<h4><?= $kontak['nama']; ?></h4>
									<li><a href="#"><?= $kontak['alamat']; ?></a></li>
									<li><a href="#"><strong>Phone :</strong> <?= $kontak['telp']; ?></a></li>
									<li><a href="#"><strong>Email :</strong> <?= $kontak['email']; ?></a></li>
                                    <li><a href="#"><strong>WA    :</strong> <?= $kontak['wa']; ?></a></li>
								</ul>
							</div>
							<div class="social-links">
								<a href="https://wa.me/6281231543474" class="linkedin"><i class="fab fa-whatsapp"></i></a>
								<a href="https://instagram.com/rsigondanglegi?igshid=NTc4MTIwNjQ2YQ==" class="instagram"><i class="fab fa-instagram"></i></a> 
								<a href="<?= $kontak['fb']; ?>" class="facebook"><i class="fab fa-facebook-f"></i></a>
								<a href="<?= $kontak['tw']; ?>" class="twitter"><i class="fab fa-twitter"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
	</section><!-- End  contact -->
</main><!-- End #main -->

 