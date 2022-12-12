<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-md-12 mb-4">
            <a href="<?= base_url('slider/tambah'); ?>" class="btn btn-info">Tambah Slider</a>
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
                            <th>Status</th>
                            <th>Opsi</th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($slider as $s) :
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>
                                    <a href="<?= base_url('assets/images/slider/' . $s['gambar_slider']) ?>" target="_blank">
                                        <img src="<?= base_url('assets/images/slider/' . $s['gambar_slider']) ?>" width="60">
                                    </a>
                                </td>
                                <td> <?= $s['judul_slider'] ?></td>
                                <td> <?= $s['deskripsi_slider'] ?></td>
                                <td>
                                    <?php if ($s['status_slider'] == "Aktif") { ?>
                                        <span class="badge badge-success">Aktif</span>
                                    <?php } else { ?>
                                        <span class="badge badge-danger">Tidak Aktif</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('slider/edit/' . $s['id_slider']) ?>" class="btn btn-success btn-sm">Edit</a>
                                    <button onclick="hapus('<?= base_url('slider/hapus/' . $s['id_slider']) ?>')" class="btn btn-danger btn-sm tombol-hapus ">Delete</button>
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