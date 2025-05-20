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
            <h6 class="m-0 font-weight-bold text-primary">Daftar Submenu</h6>
        </div>
		<div class="table-responsive">
			<table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
				<thead>
					<tr>
						<th style="width:50px;">No.</th>
						<th>Title</th>
						<th>Menu</th>
						<th>Url</th>
						<th style="width:50px;">Urut</th>
						<th style="width:50px;">Active</th>
						<th style="text-align:center;">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if ($Submenu) :
						$no = 1;
						foreach ($Submenu as $sm) :
					?>
							<tr>
								<td style="vertical-align: middle;"><?= $no++; ?></td>
								<td style="vertical-align: middle;"><?= $sm['title']; ?></td>
								<td style="vertical-align: middle;"><?= $sm['menu']; ?></td>
								<td style="vertical-align: middle;"><?= $sm['url']; ?></td>
								<td style="vertical-align: middle;"><?= $sm['urut']; ?></td>
								<td style="vertical-align: middle;"><?= $sm['is_active'] == 1 ? 'Yes' : 'No';?></td>
								<th style="width: 90px;text-align: center;vertical-align: middle;">
									<span data-toggle="modal" data-target="#Edit<?= $sm['id']; ?>">
										<a href="#" class="btn btn-circle btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
									</span>
									<span data-toggle="modal" data-target="#Delete<?= $sm['id']; ?>">
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
				<h6 class="modal-title m-0 font-weight-bold text-white" id="exampleModalLabel">Add New Submenu</h6>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('myadmin/manage/submenu'); ?>" method="post">
				<div class="modal-body py-3">
					<div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="SubMenu Title" required>
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['title']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="SubMenu URL"  required>
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
<?php foreach ($Submenu as $sm) : ?>
	<div class="modal fade" id="Edit<?= $sm['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-success py-3">
					<h6 class="modal-title m-0 font-weight-bold text-white" id="exampleModalLabel">Edit SubMenu</h6>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('myadmin/manage/editsubmenu/') . $sm['id']; ?>" method="post">
					<div class="modal-body py-3">
						<div class="form-group">
							<label for="title"><strong>SubMenu Title</strong></label>
							<input type="text" name="title" id="title" class="form-control" value="<?= $sm['title']; ?>"  required>
						</div>
						<div class="form-group">
							<label for="menu_id"><strong>Menu</strong></label>
							<select name="menu_id" id="menu_id" class="form-control">
								<?php foreach ($menu as $m) : ?>
									<option value="<?= $m['id']; ?>" <?php if($m['id']==$sm['menu_id']) echo "selected"; ?>><?= $m['title']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="url"><strong>URL</strong></label>
							<input type="text" name="url" id="url" class="form-control" value="<?= $sm['url']; ?>"  required>
						</div>
						<div class="form-group">
							<label for="urut"><strong>Urut</strong></label>
							<input type="number" name="urut" id="urut" class="form-control" value="<?= $sm['urut']; ?>"  required>
						</div>
						<div class="form-group">
							<label for="is_active"><strong>Active</strong></label>
							<select name="is_active" id="is_active" class="form-control">
								<option value=1 <?php if($sm['is_active']==1) echo "selected"; ?>>Yes</option>
								<option value=0 <?php if($sm['is_active']==0) echo "selected"; ?>>No</option>
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
<?php foreach ($Submenu as $sm) : ?>
	<div class="modal fade" id="Delete<?= $sm['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-danger py-3">
					<h6 class="modal-title m-0 font-weight-bold text-white" id="exampleModalLabel">Delete SubMenu</h6>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body py-3">Anda yakin untuk menghapus data <strong><?= $sm['title']; ?></strong> ?</div>
				<div class="modal-footer py-2">
					<a href="<?= base_url('myadmin/manage/deletesubmenu/') . $sm['id']; ?>" class="btn btn-primary btn-sm btn-icon-split">
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
