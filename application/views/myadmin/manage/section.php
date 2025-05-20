<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
	<div class="clearfix">
		<div class="float-left">
			<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
		</div>
		<div class="float-right">
				<a href="" class="btn btn-sm btn-primary btn-icon-split" data-toggle="modal" data-target="#AddNew">
					<span class="icon">
						<i class="fa fa-plus"></i>
					</span>
					<span class="text">
						Add New
					</span>
				</a>
		</div>
	</div>
	<hr>
	<?= form_error('section', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>

	<div class="card shadow-sm border-bottom-primary">
		<div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Section</h6>
        </div>
		<div class="table-responsive">
			<table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
				<thead>
					<tr>
						<th style="width:50px;">No.</th>
						<th>Section</th>
						<th style="width:50px;">Urut</th>
						<th style="width:50px;">Active</th>
						<th style="text-align:center;">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if ($section) :
						$no = 1;
						foreach ($section as $s) :
					?>
							<tr>
								<td style="vertical-align: middle;"><?= $no++; ?></td>
								<td style="vertical-align: middle;"><?= $s['section']; ?></td>
								<td style="vertical-align: middle;"><?= $s['urut']; ?></td>
								<td style="vertical-align: middle;"><?= $s['is_active'] == 1 ? 'Yes' : 'No';?></td>
								<th style="width: 90px;text-align: center;vertical-align: middle;">
									<span data-toggle="modal" data-target="#Edit<?= $s['id']; ?>">
										<a href="#" class="btn btn-circle btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
									</span>
									<span data-toggle="modal" data-target="#Delete<?= $s['id']; ?>">
										<a href="#" class="btn btn-circle btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash"></i></a>
									</span>
								</th>
							</tr>
						<?php endforeach; ?>
					<?php else : ?>
						<tr>
							<td colspan="6" class="text-center">
								Data Kosong
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Add New-->
<div class="modal fade" id="AddNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary py-3">
				<h6 class="modal-title m-0 font-weight-bold text-white" id="exampleModalLabel">Add New Section</h6>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('myadmin/manage/section'); ?>" method="post">
				<div class="modal-body py-3">
					<div class="form-group">
						<input type="text" class="form-control" id="section" name="section" placeholder="Section Name"  required>
					</div>
					<div class="form-group">
						<input type="number" class="form-control" id="urut" name="urut" placeholder="Urut"  required>
					</div>
					<div class="form-group">
						<select name="is_active" id="is_active" class="form-control">
							<option value=1>Active</option>
							<option value=0>Non Active</option>
						</select>
					</div>
					
				</div>
				<div class="modal-footer py-2">
					<button type="submit" class="btn btn-primary btn-sm btn-icon-split">
						<span class="icon"><i class="fa fa-save"></i></span>
						<span class="text">Simpan</span>
					</button>
					<button type="button" class="btn btn-danger btn-sm btn-icon-split" data-dismiss="modal">
						<span class="icon"><i class="fa fa-times"></i></span>
						<span class="text">Batal</span>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>


<!-- Modal Edit-->
<?php foreach ($section as $s) : ?>
	<div class="modal fade" id="Edit<?= $s['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-success py-3">
					<h6 class="modal-title m-0 font-weight-bold text-white" id="exampleModalLabel">Edit Section</h6>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('myadmin/manage/editsection/') . $s['id']; ?>" method="post">
					<div class="modal-body py-3">
						<div class="form-group">
							<label for="section"><strong>Section name</strong></label>
							<input type="text" name="section" id="section" class="form-control" value="<?= $s['section']; ?>"  required>
						</div>
						<div class="form-group">
							<label for="urut"><strong>Urut</strong></label>
							<input type="number" name="urut" id="urut" class="form-control" value="<?= $s['urut']; ?>"  required>
						</div>
						<div class="form-group">
							<label for="is_active"><strong>Active</strong></label>
							<select name="is_active" id="is_active" class="form-control">
								<option value=1 <?php if($s['is_active']==1) echo "selected"; ?>>Yes</option>
								<option value=0 <?php if($s['is_active']==0) echo "selected"; ?>>No</option>
							</select>
						</div>
					</div>
					<div class="modal-footer py-3">
						<button type="submit" class="btn btn-primary btn-sm btn-icon-split">
							<span class="icon"><i class="fa fa-save"></i></span>
							<span class="text">Simpan</span>
						</button>
						<button type="button" class="btn btn-danger btn-sm btn-icon-split" data-dismiss="modal">
							<span class="icon"><i class="fa fa-times"></i></span>
							<span class="text">Batal</span>
						</button>
					</div>
					</div>
				</form>

			</div>
		</div>
	</div>
<?php endforeach; ?>

<!-- Modal Delete-->
<?php foreach ($section as $s) : ?>
	<div class="modal fade" id="Delete<?= $s['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-danger py-3">
					<h6 class="modal-title m-0 font-weight-bold text-white" id="exampleModalLabel">Delete Section</h6>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body py-3">Anda yakin untuk menghapus data <strong><?= $s['section']; ?></strong> ?</div>
				<div class="modal-footer py-2">
					<a href="<?= base_url('myadmin/manage/deletesection/') . $s['id']; ?>" class="btn btn-primary btn-sm btn-icon-split">
						<span class="icon"><i class="fa fa-trash"></i></span>
						<span class="text">Hapus</span>
					</a>
					<button type="button" class="btn btn-danger btn-sm btn-icon-split" data-dismiss="modal">
						<span class="icon"><i class="fa fa-times"></i></span>
						<span class="text">Batal</span>
					</button>

				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>