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
								Form Edit Profile User
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
					<?= form_open_multipart('myadmin/profile/edit') ?>
					<div class="row form-group">
						<label class="col-md-3 text-md-right" for="foto">Foto</label>
						<div class="col-md-9">
							<div class="row">
								<div class="col-3">
									<img src="<?= base_url('assets/img/user/') . $user['image']; ?>" alt="<?= $user['name']; ?>" class="rounded-circle shadow-sm img-thumbnail">
								</div>
								<div class="col-9">
									<input type="file" name="image" id="image">
									<?= form_error('image', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
						</div>
					</div>
					<hr>
					
					<div class="row form-group">
						<label class="col-md-3 text-md-right" for="nama">Name</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user"></i></span>
								</div>
								<input value="<?= $user['name']; ?>" name="name" id="name" type="text" class="form-control" placeholder="Name">
							</div>
							<?= form_error('name', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<div class="row form-group">
						<label class="col-md-3 text-md-right" for="username">Username</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user"></i></span>
								</div>
								<input value="<?= set_value('username', $user['username']); ?>" name="username" id="username" type="text" class="form-control" placeholder="Username">
							</div>
							<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<hr>
					<div class="row form-group">
						<label class="col-md-3 text-md-right" for="email">Email</label>
						<div class="col-md-9">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-envelope"></i></span>
								</div>
								<input value="<?= $user['email']; ?>" name="email" id="email" type="text" class="form-control" placeholder="Email">
							</div>
							<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<hr>
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
					<?= form_close(); ?>
				</div>
			</div>
		</div>
	</div>

	
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->