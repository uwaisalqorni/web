<!-- Begin Page Content -->
<div class="container-fluid  pb-5">

	<!-- Page Heading -->
	<div class="clearfix">
		<div class="float-left">
			<h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
		</div>
	</div>
	<hr>
	<div class="row">

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
		  <div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
			  <div class="row no-gutters align-items-center">
				<div class="col mr-2">
				  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Dokter</div>
				  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $profil['jmldokter']; ?></div>
				</div>
				<div class="col-auto">
				  <i class="fas fa-box fa-2x text-gray-300"></i>
				</div>
			  </div>
			</div>
		  </div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
		  <div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
			  <div class="row no-gutters align-items-center">
				<div class="col mr-2">
				  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Perawat</div>
				  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $profil['jmlperawat']; ?></div>
				</div>
				<div class="col-auto">
				  <i class="fas fa-users fa-2x text-gray-300"></i>
				</div>
			  </div>
			</div>
		  </div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
		  <div class="card border-left-info shadow h-100 py-2">
			<div class="card-body">
			  <div class="row no-gutters align-items-center">
				<div class="col mr-2">
				  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Karyawan</div>
				  <div class="row no-gutters align-items-center">
					<div class="col-auto">
					  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $profil['jmlkaryawan']; ?></div>
					</div>
				  </div>
				</div>
				<div class="col-auto">
				  <i class="fas fa-file-invoice fa-2x text-gray-300"></i>
				</div>
			  </div>
			</div>
		  </div>
		</div>

		<!-- Pending Requests Card Example -->
		<div class="col-xl-3 col-md-6 mb-4">
		  <div class="card border-left-warning shadow h-100 py-2">
			<div class="card-body">
			  <div class="row no-gutters align-items-center">
				<div class="col mr-2">
				  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Pasien</div>
				  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $profil['jmlpasien']; ?></div>
				</div>
				<div class="col-auto">
				  <i class="fas fa-users fa-2x text-gray-300"></i>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="card shadow">
				<div class="card-header"><strong>Profil Rumah Sakit</strong></div>
				<div class="card-body">
					<strong>Nama : </strong><br>
					<input  type="text" value="<?= $profil['nama']; ?>" readonly class="form-control mt-2 mb-2">
					<strong>Alamat : </strong><br>
					<input  type="text" value="<?= $profil['alamat']; ?>" readonly class="form-control mt-2 mb-2">
					<strong>Telepon : </strong><br>
					<input  type="text" value="<?= $profil['telp']; ?>" readonly class="form-control mt-2 mb-2">
					<strong>Email : </strong><br>
					<input  type="text" value="<?= $profil['email']; ?>" readonly class="form-control mt-2">
				</div>				
			</div>
		</div>
		<div class="col-md-6">
			<div class="card shadow">
				<div class="card-header"><strong>User Sedang Login</strong></div>
				<div class="card-body">
					<strong>Nama : </strong><br>
					<input type="text" value="<?= $user['name']; ?>" readonly class="form-control mt-2 mb-2">
					<strong>Username : </strong><br>
					<input type="text" value="<?= $user['username']; ?>" readonly class="form-control mt-2 mb-2">
					<strong>Role : </strong><br>
					<input type="text" value="<?= $user['role']; ?>" readonly class="form-control mt-2 mb-2">
					<strong>Member since : </strong><br>
					<input type="text" value="<?= date('d F Y', strtotime($user['date_created']));?>" readonly class="form-control mt-2">
				</div>				
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->