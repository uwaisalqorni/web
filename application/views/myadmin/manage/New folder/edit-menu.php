<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <?= form_open('myadmin/manage/editmenu/' . $menu['id']); ?>
    <div class="modal-body">
        <div class="form-group">
            <label for="title">Submenu Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $menu['title']; ?>">
            <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="section_id">Menu</label>
            <select name="section_id" id="section_id" class="form-control">
                <option value="">Select Menu</option>
                <?php foreach ($section as $s) : ?>
                    <option value="<?= $s['id']; ?>" <?php if($s['id']==$menu['section_id']) echo "selected"; ?>><?= $s['section']; ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('section_id', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="url">URL</label>
            <input type="text" class="form-control" id="url" name="url" value="<?= $menu['url']; ?>">
            <?= form_error('url', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="icon">Icon</label>
            <input type="text" class="form-control" id="icon" name="icon" value="<?= $menu['icon']; ?>">
            <?= form_error('icon', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <div class="form-check">
				<input class="form-check-input" type="checkbox" value="<?= $menu['is_active']; ?>" id="is_active" name="is_active" <?php if($menu['is_active']==1) echo "checked='checked'"; ?>>
                <label class="form-check-label" for="is_active">
                    Active ?
                </label>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Edit Menu</button>
    </form>
</div>