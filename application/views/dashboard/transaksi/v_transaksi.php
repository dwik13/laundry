<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-3 text-gray-800"><?= $title; ?></h1>
        <div class="row">
            <div class="col-md-12 mb-4">
                <a href="<?= base_url('transaksi/tambah') ?>" class="btn btn-info">Tambah Transaksi</a>
            </div>
        </div>

        <?php
        if (!empty($this->session->flashdata('info'))) { ?>
            <div class="alert alert-success alert-dismissible" id="flash_data" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Selamat!</strong> <?= $this->session->flashdata('info'); ?>

            </div>
        <?php } ?>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal Masuk</th>
                                <th>Kode Transaksi</th>
                                <th>Konsumen</th>
                                <th>Paket</th>
                                <th>Berat (KG)</th>
                                <th>Grand Total</th>
                                <th>Tanggal Ambil</th>
                                <th>Status Bayar</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($transaksi as $t) : ?>
                                <tr>

                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $t->tgl_masuk; ?></td>
                                    <td><?= $t->kode_transaksi; ?></td>
                                    <td><?= $t->nama_konsumen; ?></td>
                                    <td><?= $t->nama_paket; ?></td>
                                    <td><?= $t->berat; ?></td>
                                    <td><?= "Rp. " . number_format($t->grand_total, 0, '.', '.'); ?></td>
                                    <td><?= $t->tgl_ambil; ?></td>
                                    <td><?= $t->bayar; ?></td>
                                    <td>
                                        <?php if ($t->status == "Baru") { ?>
                                            <select name="status" class="badge badge-danger status">
                                                <option value="<?= $t->kode_transaksi; ?>Baru" selected>Baru</option>
                                                <option value="<?= $t->kode_transaksi; ?>Proses">Proses</option>
                                                <option value="<?= $t->kode_transaksi; ?>Selesai">Selesai</option>
                                            </select>
                                        <?php } else if ($t->status == "Proses") { ?>
                                            <select name="status" class="badge badge-info status">
                                                <option value="<?= $t->kode_transaksi; ?>Baru">Baru</option>
                                                <option value="<?= $t->kode_transaksi; ?>Proses" selected>Proses</option>
                                                <option value="<?= $t->kode_transaksi; ?>Selesai">Selesai</option>
                                            </select>
                                        <?php } else { ?>
                                            <button class="btn btn-success btn-sm dropdown-toggle">Selesai</button>
                                        <?php } ?>
                                    </td>
                                    <?php if ($t->status == "Selesai") { ?>
                                        <td>
                                            <a href="<?= base_url('transaksi/detail/' . $t->kode_transaksi) ?>" class="btn btn-success btn-sm">Detail</a>
                                        </td>

                                    <?php } else { ?>
                                        <td>
                                            <a href="<?= base_url('transaksi/detail/' . $t->kode_transaksi) ?>" class="btn btn-success btn-sm">Detail</a>
                                            <a href="<?= base_url('transaksi/edit/' . $t->kode_transaksi); ?>" class="btn btn-warning btn-sm">Edit</a>
                                        </td>
                                    <?php } ?>


                                </tr>

                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script>
        $('.status').change(function() {
            var status = $(this).val();
            var kt = status.substr(0, 13);
            var stt = status.substr(13, 10);

            $.ajax({
                url: "<?= base_url('transaksi/update_status') ?>",
                method: "post",
                data: {
                    kt: kt,
                    stt: stt
                }

            });
            location.reload();
        });
    </script>

</body>

</html>