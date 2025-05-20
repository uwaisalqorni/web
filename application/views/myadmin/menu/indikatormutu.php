<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="clearfix">
		<div class="float-left">
			<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
		</div>
		<div class="float-right">
				<a href="<?= base_url('myadmin/menu/indikatormutu_add') ?>" class="btn btn-sm btn-primary btn-icon-split">
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
						<th style="text-align:center;width:30px;">No.</th>
						<th >Periode Tahun</th>
						<th style="text-align:center;width:30px;">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if ($indikatormutu) :
						$no = 1;
						foreach ($indikatormutu as $x) :
					?>
							<tr>
								<td style="vertical-align: middle; "><?= $no++; ?></td>
								<td style="vertical-align: middle;"><?= $x['tahun']; ?></td>
								<th style="text-align: center;vertical-align: middle;">
									<a href="<?= base_url('myadmin/menu/indikatormutu_tahun/') . $x['tahun'] ?>" class="btn btn-circle btn btn-outline-warning btn-sm" data-toggle="tooltip" data-placement="bottom" title="Detail"><i class="fa fa-info"></i></a>
								</th>
							</tr>
						<?php endforeach; ?>
					<?php else : ?>
						<tr>
							<td colspan="3" class="text-center">
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
