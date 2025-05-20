<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 m-0 text-gray-800"><?= $title; ?></h1>
	<hr>
    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <!-- Cards -->
	<div class="card shadow-sm border-bottom-primary">
		<div class="card-header">
			<h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
		</div>
		<div class="card-body">
		<?= form_open_multipart(); ?>
			<div class="form-group row">
				<div class="col-md-8">
					<table class="table">
						<tr>
							<th width="150">Nama</th>
							<td>
								<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?= $profil['nama']; ?>"required>
							</td>
						</tr>
						<tr>
							<th>Detail</th>
							<td>
								<input type="text" name="detail" class="form-control" placeholder="Detail" value="<?= $profil['detail']; ?>"required>
							</td>
						</tr>
						<tr>
							<th>Deskripsi</th>
							<td>
								<textarea name="deskripsi" class="form-control"  rows="5" required><?= $profil['deskripsi']; ?></textarea>	
							</td>
						</tr>
						<tr>
							<th>Alamat</th>
							<td>
								<input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?= $profil['alamat']; ?>"required>
							</td>
						</tr>
						<tr>
							<th>Telp</th>
							<td>
								<input type="text" name="telp" class="form-control" placeholder="Telp" value="<?= $profil['telp']; ?>"required>
							</td>
						</tr>
						<tr>
							<th>Email</th>
							<td>
								<input type="text" name="email" class="form-control" placeholder="Email" value="<?= $profil['email']; ?>"required>
							</td>
						</tr>
						<tr>
							<th>WhatsApps</th>
							<td>
								<input type="text" name="wa" class="form-control" placeholder="WhatsApps" value="<?= $profil['wa']; ?>"required>
							</td>
						</tr>
						<tr>
							<th>Facebook</th>
							<td>
								<input type="text" name="fb" class="form-control" placeholder="Facebook" value="<?= $profil['fb']; ?>"required>
							</td>
						</tr>
						<tr>
							<th>Instagram</th>
							<td>
								<input type="text" name="ig" class="form-control" placeholder="Instagram" value="<?= $profil['ig']; ?>"required>
							</td>
						</tr>
						<tr>
							<th>Twitter</th>
							<td>
								<input type="text" name="tw" class="form-control" placeholder="Twitter" value="<?= $profil['tw']; ?>"required>
							</td>
						</tr>
						<tr>
							<th>Jml Dokter</th>
							<td>
								<input type="number" name="jmldokter" class="form-control" placeholder="Jml Dokter" value="<?= $profil['jmldokter']; ?>"required>
							</td>
						</tr>
						<tr>
							<th>Jml Perawat</th>
							<td>
								<input type="number" name="jmlperawat" class="form-control" placeholder="Jml Perawat" value="<?= $profil['jmlperawat']; ?>"required>
							</td>
						</tr>
						<tr>
							<th>Jml Karyawan</th>
							<td>
								<input type="number" name="jmlkaryawan" class="form-control" placeholder="Jml Karyawan" value="<?= $profil['jmlkaryawan']; ?>"required>
							</td>
						</tr>
						<tr>
							<th>Jml Pasien</th>
							<td>
								<input type="number" name="jmlpasien" class="form-control" placeholder="Jml Pasien" value="<?= $profil['jmlpasien']; ?>"required>
							</td>
						</tr>
						<tr>
							<th></th>
							<td>					
								<button type="submit" class="btn btn-primary btn-sm btn-icon-split float-right">
									<span class="icon"><i class="fa fa-save"></i></span>
									<span class="text">Simpan</span>
								</button>
							</td>
						</tr>
					</table>
				</div>
				
				<div class="col-md-4">
					<input type="file" name="filefoto" class="dropify" data-height="300" data-default-file="<?= base_url('assets/img/umum/'). $profil['image']; ?>">
					<small>#Gunakan gambar dengan ukuran max 500kb</small>
				</div>
				
			</div>
		<?= form_close(); ?>
		</div>
	</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->