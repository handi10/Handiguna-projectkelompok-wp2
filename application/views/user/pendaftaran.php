<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-12">

            <form action="<?= base_url('user/pendaftaran'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="tgl_pendaftaran" class="col-sm-3 col-form-label">Tanggal Pendaftaran</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="tgl_pendaftaran" name="tgl_pendaftaran" disabled="disabled" value="<?= date('Y-m-d'); ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="nama" value="<?= $user['name']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ttl" class="col-sm-3 col-form-label">Tempat dan Tanggal Lahir</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="ttl" name="ttl">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-3 col-form-label">Alamat Lengkap</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_hp" class="col-sm-3 col-form-label">No Telp/HP</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="no_hp" name="no_hp">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_hp" class="col-sm-3 col-form-label">Pendidikan</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="pendidikan">
                            <option>SD</option>
                            <option>SMP</option>
                            <option>SMA/SMK</option>
                            <option>UMUM</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_hp" class="col-sm-3 col-form-label">Pilih Paket</label>
                    <div class="col-sm-9">
                        <select name="id_paket" class="form-control">
                            <option value="">Pilih Paket</option>
                            <?php

                            foreach ($paket as $row) { ?>
                                <option value="<?= $row['id_paket']; ?>"><?= $row['nama_paket']; ?> - <?= $row['jangka_waktu']; ?> - <?= $row['biaya']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row ">
                    <div class="col-sm-3">Upload Bukti Pembayaran</div>
                    <div class="col-sm-9">
                        <div class="custom-file">
                            <img src="<?= base_url('assets/img/upload/') . $user['image']; ?>" class="img-thumbnail">
                            <input type="file" class="custom-file-input" id="image" name="bukti_tf">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
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