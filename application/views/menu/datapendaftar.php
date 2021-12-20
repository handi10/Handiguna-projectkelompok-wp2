<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-12">
                   

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pendaftar</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Pendidikan</th>
                        <th scope="col">Paket</th>
                        <th scope="col">Status Pembayaran</th>
                        <th scope="col">Status Kepesertaan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pendaftar as $row) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['alamat']; ?></td>
                            <td><?= $row['no_hp']; ?></td>
                            <td><?= $row['pendidikan']; ?></td>
                            <td><?= $row['nama_paket']; ?></td>
                            <td><?= $row['status_pembayaran']; ?></td>
                            <td><?= $row['status_peserta']; ?></td>
                            <td>
                                <?php if ($row['status_pembayaran']=='Belum Diverifikasi') { ?>
                                    <button type="submit" class="btn btn-primary"><a href="<?= base_url('menu/verifikasi/') . $row['id_pendaftaran']; ?>"><font color="white">Verifikasi</font></a></button>
                               <?php } else { ?>
                                     <button type="submit" class="btn btn-primary"><a href="<?= base_url('menu/uploadsertifikat/') . $row['id_pendaftaran']; ?>"><font color="white">Update</font></a></button>
                               <?php } ?>

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

