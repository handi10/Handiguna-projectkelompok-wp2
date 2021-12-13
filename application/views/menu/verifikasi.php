<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <div class="form-group">
                <div class="col-sm-2">Bukti Transaksi</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/upload/') . $pendaftaran['bukti_tf']; ?>" class="img-thumbnail">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2">Status Pembayaran</div>
                <div class="col-sm-3">
                    <select class="form-control" name="">
                        <option>Belum Diverifikasi</option>
                        <option>Terverifikasi</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2">Status Kepesertaan</div>
                <div class="col-sm-3">
                    <select class="form-control" name="">
                        <option>Belum Aktif</option>
                        <option>Aktif</option>
                    </select>
                </div>
            </div>

            <div class="form-group row justity-content-end">
                <div class="col-sm-10">
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