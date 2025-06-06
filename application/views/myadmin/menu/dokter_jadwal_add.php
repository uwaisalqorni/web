<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="clearfix">
		<div class="float-left">
			<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
		</div>
		<div class="float-right">
				<a href="<?= base_url('myadmin/menu/dokter_jadwal/') ?><?= $dokter_id ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
					<h6 class="m-0 font-weight-bold text-primary">Add Jadwal Dokter "<?= $nama ?>"</h6>
				</div>
				<div class="card-body">
					<?= form_open(); ?>
					<div class="row form-group">
						<label class="col-md-3" for="poliklinik_id"><strong>Poliklinik</strong></label>
						<div class="col-md-9">
							<input type="hidden" name="dokter_id" class="form-control" value="<?= $dokter_id; ?>">
							<select name="poliklinik_id" id="poliklinik_id" class="custom-select mr-sm-2" required>
								<option value="">Pilih Poliklinik</option>
								<?php foreach ($poliklinik as $p) : ?>
									<option value="<?= $p['id']; ?>"><?= $p['nama']; ?></option>
								<?php endforeach; ?>
							</select>
							<?= form_error('poliklinik_id', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<hr>
					<div class="row form-group">
						<label class="col-md-3" for="hari"><strong>Hari</strong></label>
						<div class="col-md-9">
							<select name="hari" id="hari" class="custom-select mr-sm-2" required>
								<option value="Senin">Senin</option>
								<option value="Selasa">Selasa</option>
								<option value="Rabu">Rabu</option>
								<option value="Kamis">Kamis</option>
								<option value="Jumat">Jumat</option>
								<option value="Sabtu">Sabtu</option>
								<option value="Minggu">Minggu</option>
							</select>
							<?= form_error('hari', '<small class="text-danger">', '</small>'); ?>
						</div>
					</div>
					<hr>
					<div class="row form-group">
						<label class="col-md-3" for="jam"><strong>Jam</strong></label>
						<div class="col-md-9">
							<input type="text" name="jam" class="form-control" placeholder="00:00 - 24:00 WIB" value="00:00 - 24:00 WIB" required>
							<small>#Format Jam 00:00 - 24:00 WIB</small>
							<?= form_error('jam', '<small class="text-danger">', '</small>'); ?>
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