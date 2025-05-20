<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= form_open_multipart('myadmin/editor/edit') ?>
            <div class="form-group row">
                <label for="subjudul" class="col-sm-2 col-form-label">Sub Judul</label>
                <div class="col-sm-10">
                    <input type="text" name="subjudul" id="subjudul" class="form-control" value="<?= $sejarah['subjudul']; ?>">
                    <?= form_error(
                        'subjudul',
                        '<small class="text-danger pl-3">',
                        '</small>'
                    ); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea name="deskripsi" id="summernote" class="form-control" rows="10"><?= $sejarah['deskripsi']; ?></textarea>
                    <?= form_error(
                        'deskripsi',
                        '<small class="text-danger pl-3">',
                        '</small>'
                    ); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Gambar</div>
                <div class="col-sm-10">
                    <input type="file" name="filefoto" id="filefoto" class="dropify" data-height="300" data-default-file="<?= base_url() . 'assets/img/sejarah/' . $sejarah['image']; ?>">
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