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
							<th width="150">Judul</th>
							<td>
								<input type="text" name="judul" class="form-control" placeholder="Judul" value="<?= $sejarah['judul']; ?>"required>
							</td>
						</tr>
						<tr>
							<th>Deskripsi</th>
							<td>
								<!-- / <textarea name="deskripsi" id="ckeditor" class="form-control">   </textarea>  -->
								<textarea name="deskripsi" class="form-control" rows="10" required><?= $sejarah['deskripsi']; ?></textarea>	
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
					<input type="file" name="filefoto" id="filefoto" class="dropify" data-height="300" data-default-file="<?= base_url('assets/img/sejarah/'). $sejarah['image']; ?>" >
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