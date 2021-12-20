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
                        <th scope="col">Paket</th>
                        <th scope="col">Jangka Waktu</th>
                        <th scope="col">Biaya</th>
                        <th scope="col">Status Pembayaran</th>
                        <th scope="col">Status Kepesertaan</th>
                        <th scope="col">Aktif Mulai</th>
                        <th scope="col">Selesai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pendaftar as $row) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $row['nama_paket']; ?></td>
                            <td><?= $row['jangka_waktu']; ?></td>
                            <td><?= $row['biaya']; ?></td>
                            <td><?= $row['status_pembayaran']; ?></td>
                            <td><?= $row['status_peserta']; ?>&nbsp;&nbsp;
                                <?php if($row['status_peserta']=="Selesai"){ ?>
                                    <a href="<?= base_url('assets/img/sertifikat/') . $row['sertifikat']; ?>" target="_blank"> <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> <font color="white">Sertifikat</font></button></a>
                                <?php } ?>
                            </td>
                            <td><?= $row['aktif_mulai']; ?></td>
                            <td><?= $row['aktif_selesai']; ?></td>
                            
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

