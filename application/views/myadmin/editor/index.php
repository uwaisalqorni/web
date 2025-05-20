<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	
	<div class="row">
		<div class="col-md-8">
			<div class="block">
				<div class="block-header block-header-default">
					<h3 class="block-title">Add New Postss</h3>
				</div>
				<div class="block-content">
					<div class="form-group">
						<input type="text" name="xjudul" class="form-control" placeholder="Post Title" required>
					</div>
					<div class="form-group">
						<input type="text" name="xslug" class="form-control" placeholder="URL Permalink, contoh: ini-adalah-url" style="background-color: #F8F8F8;outline-color: none;border:0;color:blue;" required>
					</div>
					<div class="form-group">
						<textarea name="xisi" id="summernote" required></textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="block">
				<div class="block-header block-header-default">
					<h3 class="block-title">Publish</h3>
				</div>
				<div class="block-content">
					<div class="form-group">
						<input type="file" name="filefoto" class="dropify" data-height="190" required>
					</div>
					<div class="form-group">
							<select name="xkategori" class="form-control" required>
								<option value="">Categories</option>
							</select>
					</div>
					<div class="form-group">
							<select name="xlang" class="form-control" required>
								<option value="id">Indonesia (ID)</option>
							</select>
					</div>
				</div>
				<div class="block-content block-content-full block-content-md bg-body-light">
						<button type="submit" class="btn btn-primary btn-square btn-block">PUBLISH</button>
				</div>
			</div>
			
		</div>
		
	</div>
	
	
	

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

