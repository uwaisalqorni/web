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

	<?= $this->session->flashdata('message'); ?>
	
	<div class="card shadow-sm border-bottom-primary">
		<div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
        </div>
		<div class="table-responsive">
			<table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama</th>
						<th style="text-align:center;">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if ($poliklinik) :
						$no = 1;
						foreach ($poliklinik as $x) :
					?>
							<tr>
								<td style="vertical-align: middle; width:50px;"><?= $no++; ?></td>
								<td style="vertical-align: middle;"><?= $x['nama']; ?></td>
								<th style="width: 90px;text-align: center;vertical-align: middle;">
									<span data-toggle="modal" data-target="#Access<?= $x['id']; ?>">
										<a href="#" class="btn btn-circle btn btn-outline-warning btn-sm" data-toggle="tooltip" data-placement="bottom" title="Dokter"><i class="fa fa-user-nurse"></i></a>
									</span>
									<span data-toggle="modal" data-target="#Edit<?= $x['id']; ?>">
										<a href="#" class="btn btn-circle btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
									</span>
									<span data-toggle="modal" data-target="#Delete<?= $x['id']; ?>">
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
