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
            <h6 class="m-0 font-weight-bold text-primary">Daftar Sub Menu</h6>
        </div>
		<div class="table-responsive">
			<table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
				<thead>
					<tr>
						<th>No.</th>
						<th>Title</th>
						<th>Menu</th>
						<th>Url</th>
						<th>Icon</th>
						<th>Active</th>
						<th style="text-align:center;">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if ($subMenu) :
						$no = 1;
						foreach ($subMenu as $sm) :
					?>
							<tr>
								<td style="vertical-align: middle;"><?= $no++; ?></td>
								<td style="vertical-align: middle;"><?= $sm['title']; ?></td>
								<td style="vertical-align: middle;"><?= $sm['menu']; ?></td>
								<td style="vertical-align: middle;"><?= $sm['url']; ?></td>
								<td style="vertical-align: middle;"><?= $sm['icon']; ?></td>
								<td style="vertical-align: middle;"><?= $sm['is_active']; ?></td>
								<th style="width: 90px;text-align: center;vertical-align: middle;">
									<a href="<?= base_url('myadmin/manage/editsub/' . $sm['id']); ?>" class="btn btn-circle btn-outline-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
									<span data-toggle="modal" data-target="#Delete<?= $sm['id'];?>">
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

<!-- Modal -->

<div class="modal fade" id="AddNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('myadmin/manage/submenu/'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu Title">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu URL">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu Icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Submenu</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php  foreach ($subMenu as $sm) : ?>
<div class="modal fade" id="Delete<?= $sm['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Submenu</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Are you sure want to delete <?= $sm['title']; ?> Submenu?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('myadmin/manage/deletesub/') . $sm['id']; ?>">Delete</a>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>