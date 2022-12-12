<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-md-12 mb-4">
            <a href="<?= base_url('paket/tambah'); ?>" class="btn btn-info">Tambah Paket</a>
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
                            <th>Kode Paket</th>
                            <th>Nama Paket</th>
                            <th>Harga Paket</th>
                            <th>Opsi</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($paket as $p) : ?>
                            <tr>

                                <th scope="row"><?= $i; ?></th>
                                <td><?= $p['kode_paket']; ?></td>
                                <td><?= $p['nama_paket']; ?></td>
                                <td><?= "Rp. " . number_format($p['harga_paket'], 0, '.', '.'); ?></td>
                                <td>
                                    <a href="<?= base_url('paket/edit/' . $p['kode_paket']) ?>" class="btn btn-success btn-sm">Edit</a>

                                    <button onclick="hapuPaket('<?= base_url('paket/hapus/' . $p['kode_paket']) ?>')" class="btn btn-danger btn-sm tombol-hapus ">Delete</button>
                                </td>
                            </tr>

                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid --