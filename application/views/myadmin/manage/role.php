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

	<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
	<?= form_error('role', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
	<?= $this->session->flashdata('message'); ?>

	<div class="card shadow-sm border-bottom-primary">
		<div class="card-header">
			<h6 class="m-0 font-weight-bold text-primary">Daftar Role</h6>
		</div>
		<div class="table-responsive">
			<table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
				<thead>
					<tr>
						<th style="width:50px;">No.</th>
						<th>Role</th>
						<th style="text-align:center;">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if ($role) :
						$no = 1;
						foreach ($role as $r) :
					?>
							<tr>
								<td style="vertical-align: middle;"><?= $no++; ?></td>
								<td style="vertical-align: middle;"><?= $r['role']; ?></td>
								<th style="width: 90px;text-align: center;vertical-align: middle;">
									<span data-toggle="modal" data-target="#Access<?= $r['id']; ?>">
										<a href="#" class="btn btn-circle btn btn-outline-warning btn-sm" data-toggle="tooltip" data-placement="bottom" title="Access"><i class="fa fa-user-lock"></i></a>
									</span>
									<span data-toggle="modal" data-target="#Edit<?= $r['id']; ?>">
										<a href="#" class="btn btn-circle btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
									</span>
									<span data-toggle="modal" data-target="#Delete<?= $r['id']; ?>">
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
					<?php  ?>
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
				<h6 class="modal-title m-0 font-weight-bold text-white" id="exampleModalLabel">Add New Role</h6>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('myadmin/manage/role'); ?>" method="post">
				<div class="modal-body py-3">
					<div class="form-group m-0">
						<input type="text" class="form-control" id="role" name="role" placeholder="Role Name"  required>
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
<?php foreach ($role as $r) : ?>
	<div class="modal fade" id="Edit<?= $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-success py-3">
					<h6 class="modal-title m-0 font-weight-bold text-white" id="exampleModalLabel">Edit Role</h6>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('myadmin/manage/editrole/') . $r['id']; ?>" method="post">
					<div class="modal-body py-3">
						<div class="form-group">
							<label for="role"><strong>Role name</strong></label>
							<input type="text" name="role" id="role" class="form-control" value="<?= $r['role']; ?>"  required>
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
				</form>

			</div>
		</div>
	</div>
<?php endforeach; ?>

<!-- Modal Delete-->
<?php foreach ($role as $r) : ?>
	<div class="modal fade" id="Delete<?= $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-danger py-3">
					<h6 class="modal-title m-0 font-weight-bold text-white" id="exampleModalLabel">Delete Role</h6>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body py-3">Anda yakin untuk menghapus data <strong><?= $r['role']; ?></strong> ?</div>
				<div class="modal-footer py-2">
					<a href="<?= base_url('myadmin/manage/deleterole/') . $r['id']; ?>" class="btn btn-primary btn-sm btn-icon-split">
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

<!-- Modal Access-->
<?php foreach ($role as $r) : ?>
	<div class="modal fade" id="Access<?= $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-warning py-3">
					<h6 class="modal-title m-0 font-weight-bold text-white" id="exampleModalLabel">Access Role</h6>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body py-3">
					<div class="form-group  m-0">
						<label for="role"><strong>Role name</strong></label>
						<input type="text" name="role" id="role" class="form-control" value="<?= $r['role']; ?>" readonly>
					</div>
					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Menu</th>
								<th scope="col">Access</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1 ?>
							<?php foreach ($section as $s) : ?>
								<tr>
									<th scope="row"><?php echo $i ?></th>
									<td><?php echo $s['section']; ?></td>
									<td>
										<div class="form-check">
											<input type="checkbox" class="form-check-input" <?= check_access($r['id'], $s['id']); ?> data-role="<?= $r['id'] ?>" data-section="<?= $s['id'] ?>">
										</div>

									</td>
								</tr>
								<?php $i++; ?>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>