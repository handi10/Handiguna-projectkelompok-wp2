<!-- Begin Page Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-12">


                <?= form_open_multipart('user/datadiri'); ?>
            <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $data['email']; ?>" readonly>
                    <input type="hidden" class="form-control" id="email" name="email" value="<?= $data['id_pendaftaran']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Full name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $data['name']; ?>" readonly>
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            
             <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">TTL</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="ttl" name="ttl" value="<?= $data['ttl']; ?>" readonly>
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
             <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-8" >
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['alamat']; ?>" readonly>
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
             <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">No Hp</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $data['no_hp']; ?>" readonly>
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
             <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Pendidikan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="<?= $data['pendidikan']; ?>" readonly>
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
             <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Paket Aktif</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $data['nama_paket']; ?> - <?= $data['jangka_waktu']; ?> - <?= $data['biaya']; ?>" readonly>
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
             
             <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Status Pembayaran</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $data['status_pembayaran']; ?>" readonly>
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Status Kepesertaan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $data['status_peserta']; ?>" readonly>
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
             <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Aktif Mulai</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $data['aktif_mulai']; ?>" readonly>
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
             <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Aktif Selesai</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $data['aktif_selesai']; ?>" readonly>
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            

            </form>

        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


