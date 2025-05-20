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
			<h5 class="m-0 font-weight-bold text-primary">Hi, <?= $user['name']; ?></h5>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-2 mb-4 mb-md-0">
					<img src="<?= base_url('assets/img/user/') . $user['image']; ?>" alt="" class="img-thumbnail rounded mb-2">
					<a href="<?= base_url('myadmin/profile/edit'); ?>" class="btn btn-sm btn-block btn-primary"><i class="fa fa-edit"></i> Edit Profile</a>
					<a href="<?= base_url('myadmin/profile/changepass'); ?>" class="btn btn-sm btn-block btn-primary"><i class="fa fa-lock"></i> Ubah Password</a>
				</div>
				<div class="col-md-10">
					<table class="table">
						<tr>
							<th width="200">Username</th>
							<td><?= $user['username']; ?></td>
						</tr>
						<tr>
							<th>Email</th>
							<td><?= $user['email']; ?></td>
						</tr>
						<tr>
							<th>Member since</th>
							<td><?= date('d F Y', strtotime($user['date_created']));?></td>
						</tr>
						<tr>
							<th>Role</th>
							<td class="text-capitalize"><?= $user['role']; ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->