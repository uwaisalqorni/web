<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 m-0 text-gray-800"><?= $title; ?></h1>
	<hr>
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card shadow-sm border-bottom-primary">
				<div class="card-header bg-white py-3">
					<div class="row">
						<div class="col">
							<h4 class="h5 align-middle m-1 font-weight-bold text-primary">
								Form Ubah Password
							</h4>
						</div>
						<div class="col-auto">
							<a href="<?= base_url('myadmin/profile') ?>" class="btn btn-sm btn-secondary btn-icon-split">
								<span class="icon">
									<i class="fa fa-arrow-left"></i>
								</span>
								<span class="text">
									Kembali
								</span>
							</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<form action="<?= base_url('myadmin/profile/changepass') ?>" method="post">
						<div class="row form-group">
							<label class="col-md-3 text-md-right" for="current_pass">Current Password</label>
							<div class="col-md-9">
								<input value="<?= set_value('current_pass'); ?>" name="current_pass" id="current_pass" type="password" class="form-control" placeholder="Current Password">
								<?= form_error('current_pass', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<hr>
						<div class="row form-group">
							<label class="col-md-3 text-md-right" for="password_baru">New Password</label>
							<div class="col-md-9">
								<input value="<?= set_value('new_pass1'); ?>" name="new_pass1" id="new_pass1" type="password" class="form-control" placeholder="New Password">
								<?= form_error('new_pass1', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class="row form-group">
							<label class="col-md-3 text-md-right" for="konfirmasi_password">Repeat Password</label>
							<div class="col-md-9">
								<input value="<?= set_value('new_pass2'); ?>" name="new_pass2" id="new_pass2" type="password" class="form-control" placeholder="Repeat Password">
								<?= form_error('new_pass2', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-9 offset-md-3">
								<button type="submit" class="btn btn-primary btn-sm btn-icon-split">
									<span class="icon"><i class="fa fa-save"></i></span>
									<span class="text">Simpan</span>
								</button>
								<button type="reset" class="btn btn-danger btn-sm btn-icon-split">
									<span class="icon"><i class="fa fa-times"></i></span>
									<span class="text">Batal</span>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->