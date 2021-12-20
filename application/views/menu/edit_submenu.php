<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart('menu/simpaneditSubmenu'); ?>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" value="<?= $submenu['title']; ?>">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $submenu['id']; ?>">
                    <?= form_error('menu', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Sub Menu</label>
                <div class="col-sm-10">
                   <select name="menu_id" id="menu_id" class="form-control" required="required">
                    <option value="">Select Menu</option>
                    <?php foreach ($menu as $m) : ?>
                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">URL</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="url" name="url" value="<?= $submenu['url']; ?>">
                <?= form_error('url', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Icon</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="icon" name="icon" value="<?= $submenu['icon']; ?>">
                <?= form_error('Icon', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Aktif </label>
            <div class="col-sm-10">
                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                <label class="form-check-label" for="is_active">
                    Active?
                </label>

            </div>
        </div>
        <div class="form-group row justity-content-end">
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