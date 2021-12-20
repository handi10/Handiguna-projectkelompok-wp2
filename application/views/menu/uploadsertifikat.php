<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">

            
             <?= form_open_multipart('menu/simpansertifikat'); ?>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $daftar['email']; ?>" readonly>
                    <input type="hidden" class="form-control" id="id_pendaftaran" name="id_pendaftaran" value="<?= $daftar['id_pendaftaran']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Full name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $daftar['name']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Paket Yang Dipilih</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $daftar['nama_paket']; ?> - <?= $daftar['jangka_waktu']; ?> - <?= $daftar['biaya']; ?>" readonly>
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

         
           

            <div class="form-group row">
                <label for="no_hp" class="col-sm-3 col-form-label">Status Peserta</label>
                <div class="col-sm-9">
                    <select class="form-control" name="status_peserta">
                        <option value="">Pilih Status</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                    <?= form_error('status_peserta', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
             <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Upload Sertifikat</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" id="sertifikat" name="sertifikat">
                </div>
            </div>
            
            <div class="form-group row justity-content-end">

                <div class="col-sm-3"></div>
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>

        </form>

    </div>
</div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->