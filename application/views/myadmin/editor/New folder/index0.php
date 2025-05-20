<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('myadmin/user/changepass') ?>" method="post">
                <div class="form-group">
                    <label for="currentPass">Current Password</label>
                    <input type="password" class="form-control" name="current_pass" id="current_pass">
                    <?= form_error(
                        'current_pass',
                        '<small class="text-danger pl-3">',
                        '</small>'
                    ); ?>
                </div>
				<div class="form-group">
					<textarea name="editor" id="ckeditor" required></textarea>
				</div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary"> Submit </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->