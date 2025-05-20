<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="clearfix">
		<div class="float-left">
			<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
		</div>
		<div class="float-right">
				<a href="<?= base_url('myadmin/menu/foto_kategori') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
					<?= form_open(); ?>
					<div class="row form-group">
						<label class="col-md-3" for="nama"><strong>Nama</strong></label>
						<div class="col-md-9">
							<input type="hidden" name="id" class="form-control"value="<?= $foto_kategori['id']; ?>">
							<input type="text" name="nama" class="form-control" placeholder="Nama..." value="<?= $foto_kategori['nama']; ?>" required>
							<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<hr>
					<div class="row form-group">
						<label class="col-md-3" for="urut"><strong>Urut</strong></label>
						<div class="col-md-9">
							<input type="number" name="urut" class="form-control" placeholder="Urut..." value="<?= $foto_kategori['urut'];?>" required>
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