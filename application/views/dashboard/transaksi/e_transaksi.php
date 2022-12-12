<?php
date_default_timezone_set('Asia/Jakarta');
$tgl_masuk = date('Y-m-d h:i:s');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
</head>

<body>
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-3 text-gray-800"><?= $title; ?></h1>


        <div class="card shadow mb-4" style="width: 602px;">
            <div class="card-body">
                <form action="<?= base_url('transaksi/ubah'); ?>" method="post">
                    <div class="form-group">
                        <input type="text" name="kode_transaksi" id="kode_transaksi" value="<?= $transaksi['kode_transaksi'] ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <select name="kode_konsumen" id="konsumen" class="form-control" required>
                            <?php foreach ($konsumen as $k) :
                                if ($transaksi['kode_konsumen'] == $k['kode_konsumen']) { ?>
                                    <option value="<?= $k['kode_konsumen'] ?>" selected><?= $k['nama_konsumen']; ?></option>
                                <?php } else { ?>
                                    <option value="<?= $k['kode_konsumen'] ?>"><?= $k['nama_konsumen']; ?></option>
                                <?php } ?>
                            <?php endforeach; ?>
                        </select>
                    </div> "Bayar"
                    <div class="form-group">
                        <select name="kode_paket" id="paket" class="form-control" required>
                            <?php foreach ($paket as $p) :
                                if ($transaksi['kode_paket'] == $k['kode_paket']) { ?>
                                    <option value="<?= $p['kode_paket'] ?>" selected><?= $p['nama_paket']; ?></option>
                                <?php } else { ?>
                                    <option value="<?= $p['kode_paket'] ?>"><?= $p['nama_paket']; ?></option>
                                <?php } ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" id="harga" class="form-control" value="<?= $transaksi['harga_paket'] ?>" readonly placeholder="Harga Paket">
                    </div>
                    <div class="form-group">
                        <input type="number" name="berat" id="berat" class="form-control" value="<?= $transaksi['berat'] ?>" placeholder="Berat (KG)">
                    </div>
                    <div class="form-group">
                        <input type="number" name="grand_total" id="grand_total" value="<?= $transaksi['grand_total'] ?>" class="form-control" placeholder="Grand Total" readonly>
                    </div>
                    <div class="form-group" hidden>
                        <input type="text" name="tgl_masuk" value="<?= $tgl_masuk; ?>" class="form-control" placeholder="Tanggal Masuk" readonly>
                    </div>
                    <div class="form-group">
                        <select name="bayar" class="form-control" required>

                            <?php if ($transaksi['bayar'] == "Lunas") { ?>
                                <option value="Lunas" selected>Lunas</option>
                                <option value="Belum Lunas">Belum Lunas</option>

                            <?php } else { ?>
                                <option value="Lunas">Lunas</option>
                                <option value="Belum Lunas" selected>Belum Lunas</option>
                            <?php } ?>
                        </select>

                    </div>
                    <div class="form-group" hidden>
                        <input type="text" name="status" value="Baru" class="form-control" placeholder="Status" readonly>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-info ">Update</button>
                        <a href="<?= base_url('transaksi'); ?>" class="btn btn-secondary ml-3">Batal</a>
                    </div>
                </form>
            </div>
        </div>


    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</body>

</html>

<script>
    $('#paket').change(function() {
        var kode_paket = $(this).val();
        $.ajax({
            url: '<?= base_url() ?>transaksi/getHargaPaket',
            data: {
                kode_paket: kode_paket
            },
            method: 'post',
            dataType: 'JSON',
            success: function(hasil) {
                $('#harga').val(hasil.harga_paket);
            }
        });
    });

    $('#berat').keyup(function() {
        var berat = $(this).val();
        var harga = document.getElementById('harga').value;
        $('#grand_total').val(berat * harga);
    });
</script>