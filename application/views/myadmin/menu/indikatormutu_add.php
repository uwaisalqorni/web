<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="clearfix">
		<div class="float-left">
			<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
		</div>
		<div class="float-right">
				<a href="<?= base_url('myadmin/menu/indikatormutu') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
					<h6 class="m-0 font-weight-bold text-primary">Add <?= $title ?></h6>
				</div>
				<div class="card-body">
					<?= form_open(); ?>
					<div class="row form-group">
						<label class="col-md-3" for="nama"><strong>Nama</strong></label>
						<div class="col-md-9">
							<input type="text" name="nama" class="form-control" placeholder="Nama..." value="<?= set_value('nama'); ?>" required>
							<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<hr>
					<div class="row form-group">
						<label class="col-md-3" for="deskripsi"><strong>Deskripsi</strong></label>
						<div class="col-md-9">
							<input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi..." value="<?= set_value('deskripsi'); ?>" required>
							<?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<hr>
					<div class="row form-group">
						<label class="col-md-3" for="periode"><strong>Periode</strong></label>
						<div class="col-md-9">
							<input type="text" name="periode" class="form-control" placeholder="Periode..." value="<?= set_value('periode'); ?>" required>
							<?= form_error('periode', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<hr>
					<div class="row form-group">
						<label class="col-md-3" for="tahun"><strong>Tahun</strong></label>
						<div class="col-md-9">
							<input type="number" name="tahun" class="form-control" placeholder="Tahun..." value="<?= set_value('tahun'); ?>" required>
							<?= form_error('periode', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<hr>
					<div class="row form-group">
						<label class="col-md-3" for="url"><strong>URL</strong></label>
						<div class="col-md-9">
							<input type="text" name="url" class="form-control" placeholder="URL..." value="<?= set_value('url'); ?>">
							<?= form_error('url', '<small class="text-danger">', '</small>'); ?>
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