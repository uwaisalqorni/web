

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
					
					<div class="row">
						<div class="col-lg-6">
							<?= $this->session->flashdata('message'); ?>
							<form action="<?= base_url('myadmin/editor/') ?>" method="post">
								<div class="form-group">
									<label for="title">Title</label>
									<input type="text" class="form-control" name="title" id="title" placeholder="Title">
									<?= form_error(
										'title',
										'<small class="text-danger pl-3">',
										'</small>'
									); ?>
								</div>
								<div class="form-group">
									<label>Contents</label>
									<textarea name="contents" id="summernote"></textarea>
								</div>

								<div class="form-group">
									<button type="submit" class="btn btn-primary float-right">Submit</button>
								</div>
							</form>
						</div>
					</div>

				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			