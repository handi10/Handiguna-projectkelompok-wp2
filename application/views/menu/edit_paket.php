<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart('menu/editPaket'); ?>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Paket Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_paket" name="nama_paket" value="<?= $paket['nama_paket']; ?>">
                    <input type="hidden" class="form-control" id="id_paket" name="id_paket" value="<?= $paket['id_paket']; ?>">
                    <?= form_error('nama_paket', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Jangka Waktu</label>
                <div class="col-sm-10">
                    <select class="form-control" name="jangka_waktu">
                        <option>1 Bulan</option>
                        <option>3 Bulan</option>
                        <option>6 Bulan</option>
                        <option>12 Bulan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Biaya</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="biaya" name="biaya" value="<?= $paket['biaya']; ?>">
                    <?= form_error('biaya', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $paket['deskripsi']; ?>">
                    <?= form_error('biaya', '<small class="text-danger pl-3">', '</small>'); ?>
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