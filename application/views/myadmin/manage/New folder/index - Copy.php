<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h2 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header bg-white py-3">
			<div class="row">
				<div class="col">
					<h4 class="h5 align-middle m-0 font-weight-bold text-primary">
						Data User
					</h4>
				</div>
				<div class="col-auto">
					<a href="<?= base_url('') ?>" class="btn btn-sm btn-primary btn-icon-split">
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
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Date Created</th>
                            <th>RoleID</th>
                            <th>Images</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_user as $users) :
                            ?>
                            <tr>
                                <td><?= $users['name']; ?></td>
                                <td><?= $users['email']; ?></td>
                                <td><?= $users['username']; ?></td>
                                <td><?= date('d F Y', $users['date_created']); ?></td>
                                <td><?= $users['role_id']; ?></td>
                                <td><?= $users['image']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->