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
	
	<?php if (validation_errors()) : ?>
		<div class="alert alert-danger" role="alert">
			<?= validation_errors(); ?>
		</div>
	<?php endif; ?>
	<?= $this->session->flashdata('message'); ?>
	
	<div class="card shadow-sm border-bottom-primary">
		<div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
        </div>
		<div class="table-responsive">
			<table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama</th>
						<th>Username</th>
						<th>Email</th>
						<th>Date Created</th>
						<th>Role</th>
						<th>Images</th>
						<th style="text-align:center;">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if ($all_user) :
						$no = 1;
						foreach ($all_user as $u) :
					?>
							<tr>
								<td style="vertical-align: middle;"><?= $no++; ?></td>
								<td style="vertical-align: middle;"><?= $u['name']; ?></td>
								<td style="vertical-align: middle;"><?= $u['username']; ?></td>
								<td style="vertical-align: middle;"><?= $u['email']; ?></td>
								<td style="vertical-align: middle;"><?= date('d F Y', strtotime($u['date_created']));?></td>
								<td style="vertical-align: middle;"><?= $u['role']; ?></td>
								<td><img src="<?= base_url('assets/img/user/') . $u['image']; ?>" style="width: 50px;"></td>
								<th style="width: 90px;text-align: center;vertical-align: middle;">
									<span data-toggle="modal" data-target="#Edit<?= $u['id']; ?>">
										<a href="#" class="btn btn-circle btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
									</span>
									<span data-toggle="modal" data-target="#ChangePass<?= $u['id']; ?>">
										<a href="#" class="btn btn-circle btn btn-outline-warning btn-sm" data-toggle="tooltip" data-placement="bottom" title="ChangePass"><i class="fa fa-lock"></i></a>
									</span>
									<span data-toggle="modal" data-target="#Delete<?= $u['id']; ?>">
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
				<h6 class="modal-title m-0 font-weight-bold text-white" id="exampleModalLabel">Add New User</h6>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('myadmin/manage/user'); ?>" method="post">
				<div class="modal-body py-3">
					<div class="form-group">
						<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?= set_value('name'); ?>" required>
						<?= form_error('name','<small class="text-danger pl-3">','</small>'); ?>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
						<?= form_error('username','<small class="text-danger pl-3">','</small>'); ?>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
						<?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
					</div>
					<div class="form-group">
                        <select name="role_id" id="role_id" class="custom-select mr-sm-2">
                            <option value="">Select Role</option>
                            <?php foreach ($user_role as $r) : ?>
                                <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
						<?= form_error('role_id','<small class="text-danger pl-3">','</small>'); ?>
                    </div>
					<div class="form-group row">
						<div class="col-sm-6">
							<input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
							<?= form_error('password1','<small class="text-danger pl-3">','</small>'); ?>
						</div>
						<div class="col-sm-6">
							<input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password">
						</div>
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
<?php foreach ($all_user as $u) : ?>
	<div class="modal fade" id="Edit<?= $u['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-success py-3">
					<h6 class="modal-title m-0 font-weight-bold text-white" id="exampleModalLabel">Edit User</h6>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('myadmin/manage/edituser/') . $u['id']; ?>" method="post">
					<div class="modal-body py-3">
						<div class="form-group">
							<label for="name"><strong>Name</strong></label>
							<input type="hidden" id="id" name="id" value="<?= $u['id']; ?>">
							<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?= $u['name']; ?>">
							<?= form_error('name','<small class="text-danger pl-3">','</small>'); ?>
						</div>
						<div class="form-group">
							<label for="username"><strong>Username</strong></label>
							<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $u['username']; ?>" readonly>
							<?= form_error('username','<small class="text-danger pl-3">','</small>'); ?>
						</div>
						<div class="form-group">
							<label for="email"><strong>Email</strong></label>
							<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= $u['email']; ?>" readonly>
							<?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
						</div>
						<div class="form-group">
							<label for="role_id"><strong>Role</strong></label>
							<select name="role_id" id="role_id" class="form-control">
								<?php foreach ($user_role as $r) : ?>
									<option value="<?= $r['id']; ?>" <?php if($r['id']==$u['role_id']) echo "selected"; ?>><?= $r['role']; ?></option>
								<?php endforeach; ?>
							</select>
							<?= form_error('role_id','<small class="text-danger pl-3">','</small>'); ?>
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


<!-- Modal ResetPass-->

	<div class="modal fade" id="ChangePass<?= $u['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-warning py-3">
					<h6 class="modal-title m-0 font-weight-bold text-white" id="exampleModalLabel">Change Password User</h6>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('myadmin/manage/changepassuser/') . $u['id']; ?>" method="post">
					<div class="modal-body py-3">
						<div class="form-group">
							<label for="new_pass"><strong>New Password</strong></label>
							<input type="hidden" id="id" name="id" value="<?= $u['id']; ?>">
							<input type="text" class="form-control" id="new_pass" name="new_pass" placeholder="New Password">
							<?= form_error('new_pass','<small class="text-danger pl-3">','</small>'); ?>
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


<!-- Modal Delete-->

	<div class="modal fade" id="Delete<?= $u['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-danger py-3">
					<h6 class="modal-title m-0 font-weight-bold text-white" id="exampleModalLabel">Delete User</h6>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body py-3">
					<input type="hidden" id="id" name="id" value="<?= $u['id']; ?>">
					Anda yakin untuk menghapus data <strong><?= $u['username']; ?></strong> ?
				</div>
				<div class="modal-footer py-2">
					<a href="<?= base_url('myadmin/manage/deleteuser/') . $u['id']; ?>" class="btn btn-primary btn-sm btn-icon-split">
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