<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
            <?= form_open('myadmin/manage/editmenu/' . $section['id']); ?>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Menu name</label>
                <div class="col-sm-10">
                    <input type="text" name="section" id="section" class="form-control" value="<?= $section['section']; ?>">
                    <?= form_error('section', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>

            </form>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->