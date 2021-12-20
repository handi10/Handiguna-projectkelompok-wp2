<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-10">

            <?= form_error('paket', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Tambah Data Paket</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Paket</th>
                        <th scope="col">Jangka Waktu</th>
                        <th scope="col">Biaya</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($paket as $row) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $row['nama_paket']; ?></td>
                            <td><?= $row['jangka_waktu']; ?></td>
                            <td><?= $row['biaya']; ?></td>
                            <td><?= $row['deskripsi']; ?></td>
                            <td>
                                <a href="<?= base_url('menu/editpaket/') . $row['id_paket']; ?>" class="badge bg-success">edit</a>
                                <a href="<?= base_url('menu/hapuspaket/') . $row['id_paket']; ?>" onclick="return confirm('Kamu yakin akan menghapus data ini ?');" class="badge bg-danger">delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Tambah Data Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/paket'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_paket" name="nama_paket" placeholder="Nama Paket">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="jangka_waktu">
                            <option>1 Bulan</option>
                            <option>3 Bulan</option>
                            <option>6 Bulan</option>
                            <option>12 Bulan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="biaya" name="biaya" placeholder="Biaya">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi Paket">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>