<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-md-12 mb-4">
            <a href="<?= base_url('about/tambah'); ?>" class="btn btn-info">Tambah About</a>
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
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Opsi</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($about as $a) :
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>
                                    <a href="<?= base_url('assets/images/about/' . $a['gambar_about']) ?>" target="_blank">
                                        <img src="<?= base_url('assets/images/about/' . $a['gambar_about']) ?>" width="60">
                                    </a>
                                </td>
                                <td> <?= $a['judul_about'] ?></td>
                                <td> <?= $a['deskripsi_about'] ?></td>
                                <td>
                                    <a href="<?= base_url('about/edit/' . $a['id_about']) ?>" class="btn btn-success btn-sm">Edit</a>
                                    <button onclick="hapusAbout('<?= base_url('about/hapus/' . $a['id_about']) ?>')" class="btn btn-danger btn-sm tombol-hapus ">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<script src="<?= base_url('assets/admin/js/konfirmasi.js') ?>"></script>