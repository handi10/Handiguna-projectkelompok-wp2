<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart('admin/editRole'); ?>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Role Name</label>
                <div class="col-sm-10">
                    <input type="hidden" class="form-control" id="roleId" name="roleId" value="<?= $role['id']; ?>">
                    <input type="text" class="form-control" id="role" name="role" value="<?= $role['role']; ?>">
                    <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
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