<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="clearfix">
		<div class="float-left">
			<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
		</div>
		<div class="float-right">
			<div class="col-auto">
				<a href="<?= base_url('') ?>" class="btn btn-sm btn-primary btn-icon-split">
					<span class="icon">
						<i class="fa fa-plus"></i>
					</span>
					<span class="text">
						Tambah User
					</span>
				</a>
				<a href="<?= base_url('') ?>" class="btn btn-sm btn-danger btn-icon-split">
					<span class="icon">
						<i class="fa fa-plus"></i>
					</span>
					<span class="text">
						Tambah User
					</span>
				</a>
			</div>
		</div>
	</div>
	<hr>
	<div class="card shadow-sm border-bottom-primary">
		<div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Table User</h6>
        </div>
		<div class="table-responsive">
			<table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
				<thead>
					<tr>
						<th>No.</th>
						<th>Name</th>
						<th>Username</th>
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
						foreach ($all_user as $users) :
					?>
							<tr>
								<td style="vertical-align: middle;"><?= $no++; ?></td>
								<td style="vertical-align: middle;"><?= $users['name']; ?></td>
								<td style="vertical-align: middle;"><?= $users['username']; ?></td>
								<td style="vertical-align: middle;"><?= date('d F Y', $users['date_created']); ?></td>
								<td style="vertical-align: middle;"><?= $users['role']; ?></td>
								<td><img src="<?= base_url('assets/img/profile/') . $users['image']; ?>" style="width: 50px;"></td>
								<th style="width: 90px;text-align: center;vertical-align: middle;">
									<a href="" class="btn btn-circle btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
									<a onclick="return confirm('Yakin ingin hapus?')" href="" class="btn btn-circle btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash"></i></a>
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