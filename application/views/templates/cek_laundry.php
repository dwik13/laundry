<form action="<?= base_url('cek_laundry') ?>" method="post">
    <div class="container">
        <div class="row my-5">
            <div class="col-md-10">
                <input type="text" name="kode_transaksi" autocomplete="off" class="form-control" placeholder="Silahkan masukkan kode transaksi anda !">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-info">Cek Laundry</button>
            </div>
        </div>
    </div>
</form>

<div class="container">
    <table class="table table-bordered table-striped mb-5 bg-info">
        <thead>
            <tr>
                <th>Nama Konsumen</th>
                <th>Tanggal Masuk</th>
                <th>Paket</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($data)) { ?>
                <?php foreach ($data as $t) : ?>
                    <tr>
                        <td><?= $t->nama_konsumen; ?></td>
                        <td><?= $t->tgl_masuk; ?></td>
                        <td><?= $t->nama_paket; ?></td>
                        <td><?= "Rp. " . number_format($t->grand_total, 0, '.', '.'); ?></td>
                        <td><?= $t->status; ?></td>
                    </tr>

                <?php endforeach; ?>
            <?php } else { ?>
                <td colspan="5" class="bg-light">Tidak Ada Data</td>
            <?php } ?>
        </tbody>
    </table>
</div>