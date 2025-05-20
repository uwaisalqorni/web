<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="clearfix">
		<div class="float-left">
			<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
		</div>
		<div class="float-right">
				<a href="<?= base_url('myadmin/menu/indikatormutu_add/')?><?= $tahun ?>" class="btn btn-sm btn-primary btn-icon-split">
					<span class="icon">
						<i class="fa fa-plus"></i>
					</span>
					<span class="text">
						Add New
					</span>
				</a>
				<a href="<?= base_url('myadmin/menu/indikatormutu') ?>" class="btn btn-sm btn-secondary btn-icon-split">
					<span class="icon">
						<i class="fa fa-arrow-left"></i>
					</span>
					<span class="text">
						Kembali
					</span>
				</a>
		</div>
	</div>
	<hr>
	
	<?= $this->session->flashdata('message'); ?>
	
	<div class="card shadow-sm border-bottom-primary">
		<div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Indikator Mutu Periode Tahun "<?= $tahun ?>"</h6>
        </div>
		<div class="table-responsive">
			<table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama</th>
						<th>Deskripsi</th>
						<th>Periode</th>
						<th style="text-align:center;">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if ($indikatormutu_tahun) :
						$no = 1;
						foreach ($indikatormutu_tahun as $x) :
					?>
							<tr>
								<td style="vertical-align: middle; width:50px;"><?= $no++; ?></td>
								<td style="vertical-align: middle;"><?= $x['nama']; ?></td>
								<td style="vertical-align: middle;"><?= $x['deskripsi']; ?></td>
								<td style="vertical-align: middle;"><?= $x['periode']; ?></td>
								<th style="width: 90px;text-align: center;vertical-align: middle;">
									<a href="<?= base_url('myadmin/menu/indikatormutu_detail/') . $x['id'] ?>" class="btn btn-circle btn btn-outline-warning btn-sm" data-toggle="tooltip" data-placement="bottom" title="Detail"><i class="fa fa-info"></i></a>
									<a href="<?= base_url('myadmin/menu/indikatormutu_edit/') . $x['id'] ?>" class="btn btn-circle btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
									<span data-toggle="modal" data-target="#Delete<?= $x['id']; ?>">
										<a href="#" class="btn btn-circle btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash"></i></a>
									</span>
									
								</th>
								
							</tr>
						<?php endforeach; ?>
					<?php else : ?>
						<tr>
							<td colspan="5" class="text-center">
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

<!-- Modal Delete-->
<?php foreach ($indikatormutu_tahun as $x) : ?>
	<div class="modal fade" id="Delete<?= $x['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-danger py-3">
					<h6 class="modal-title m-0 font-weight-bold text-white" id="exampleModalLabel">Delete indikatormutu Detail</h6>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body py-3">Anda yakin untuk menghapus data <strong><?= $x['nama']; ?></strong> ?</div>
				<div class="modal-footer py-2">
					<a href="<?= base_url('myadmin/menu/indikatormutu_delete/') . $x['id']; ?>" class="btn btn-primary btn-sm btn-icon-split">
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