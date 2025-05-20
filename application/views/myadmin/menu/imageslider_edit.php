<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="clearfix">
		<div class="float-left">
			<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
		</div>
		<div class="float-right">
				<a href="<?= base_url('myadmin/menu/imageslider') ?>" class="btn btn-sm btn-secondary btn-icon-split">
					<span class="icon">
						<i class="fa fa-arrow-left"></i>
					</span>
					<span class="text">
						Kembali
					</span>
				</a>
		</div>
	</div>
	<hr>
	
	<?= $this->session->flashdata('message'); ?>
	
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card shadow-sm border-bottom-primary">
				<div class="card-header">
					<h6 class="m-0 font-weight-bold text-primary">Edit <?= $title ?></h6>
				</div>
				<div class="card-body">
					<?= form_open_multipart(); ?>
					<div class="row form-group">
						<div class="col-md-12">
							<input type="file" name="filefoto" class="dropify" data-height="300" data-default-file="<?= base_url('assets/img/imageslider/'). $imageslider['image']; ?>">
							<?= form_error('filefoto', '<small class="text-danger">', '</small>'); ?>
							<small>#Gunakan gambar dengan dimensi 1200x700 ukuran max 500kb</small>
						</div>
					</div>
					<hr>
					<div class="row form-group">
						<label class="col-md-3" for="title"><strong>Nama</strong></label>
						<div class="col-md-9">
							<input type="hidden" name="id" class="form-control"value="<?= $imageslider['id']; ?>">
							<input type="text" name="nama" class="form-control" placeholder="Nama..." value="<?= $imageslider['nama']; ?>" required>
							<?= form_error('title', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<hr>
					<div class="row form-group">
						<label class="col-md-3" for="urut"><strong>Urut</strong></label>
						<div class="col-md-9">
							<input type="number" name="urut" class="form-control" placeholder="Urut..." value="<?= $imageslider['urut'];?>" required>
							<?= form_error('urut', '<small class="text-danger">', '</small>'); ?>
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