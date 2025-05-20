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
								<input type="text" name="judul" class="form-control" placeholder="Judul" value="<?= $visimisi['judul']; ?>"required>
							</td>
						</tr>
						<tr>
							<th>Visi</th>
							<td>
								<input type="text" name="visi" class="form-control" placeholder="Visi" value="<?= $visimisi['visi']; ?>"required>
							</td>
						</tr>
						<tr>
							<th>Misi</th>
							<td>
								<textarea name="misi" id="summernote" class="form-control" required><?= $visimisi['misi']; ?></textarea>	
							</td>
						</tr>
						<tr>
							<th>Motto</th>
							<td>
								<input type="text" name="motto" class="form-control" placeholder="Motto" value="<?= $visimisi['motto']; ?>"required>
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
					<input type="file" name="filefoto" id="filefoto" class="dropify" data-height="300" data-default-file="<?= base_url('assets/img/visimisi/'). $visimisi['image']; ?>" required>
				</div>
				
			</div>
		<?= form_close(); ?>
		</div>
	</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->