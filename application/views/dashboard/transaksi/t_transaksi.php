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
                <form action="<?= base_url('transaksi/simpan'); ?>" method="post">
                    <div class="form-group">
                        <input type="text" name="kode_transaksi" value="<?= "TR" . date('Ymd') .  $kode_transaksi; ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <select name="kode_konsumen" id="kode_konsumen" class="form-control" required>
                            <option value="" selected>- Pilih Konsumen -</option>
                            <?php foreach ($konsumen as $k) : ?>
                                <option value="<?= $k['kode_konsumen']; ?>"><?= $k['nama_konsumen'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="kode_paket" id="paket" class="form-control" required>
                            <option value="" selected>- Pilih Paket -</option>
                            <?php foreach ($paket as $p) : ?>
                                <option value="<?= $p['kode_paket']; ?>"><?= $p['nama_paket'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="harga" id="harga" class="form-control" readonly placeholder="Harga Paket">
                    </div>
                    <div class="form-group">
                        <input type="number" name="berat" id="berat" class="form-control" placeholder="Berat (KG)">
                    </div>
                    <div class="form-group">
                        <input type="number" name="grand_total" id="grand_total" class="form-control" placeholder="Grand Total" readonly>
                    </div>
                    <div class="form-group">
                        <input type="date" name="tgl_masuk" id="iTglMasuk" value="<?= $tgl_masuk; ?>" class="form-control" placeholder="Tanggal Masuk" onchange="jumlah()">
                    </div>
                    <div class="form-group" hidden>
                        <input type="date" name="tgl_ambil" id="tAmbil" class="form-control">
                    </div>
                    <div class="form-group">
                        <select name="bayar" class="form-control" required>
                            <option value="" selected>- Pilih Status Bayar -</option>
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Lunas">Belum Lunas</option>
                        </select>
                    </div>
                    <div class="form-group" hidden>
                        <input type="text" name="status" value="Baru" class="form-control" placeholder="Status" readonly>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-info ">Simpan</button>
                        <a href="<?= base_url('transaksi'); ?>" class="btn btn-secondary ml-3">Batal</a>
                    </div>
                </form>
            </div>
        </div>


    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
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

<script type="text/javascript">
    function jumlah() {
        var jh = 2;
        var ta = document.getElementById("iTglMasuk").value;
        var hari = jh * 24 * 60 * 60 * 1000;

        var ambil = new Date(new Date(ta).getTime() + (hari));

        // console.log(ambil);

        document.getElementById('tAmbil').value = ambil.toISOString().slice(0, 10);
    }
</script>