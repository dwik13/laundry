<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
    <style>
        .title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        }

        .title,
        .tanggal {
            text-align: center;
            font-size: 24px;
            font-family: sans-serif;
        }

        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 13px;

        }

        /* 
        #table tr:nth-child(even) {
            background-color: #f9f8f8;
        } */

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #558595;
            color: white;
            font-size: 13px;
        }
    </style>
</head>

<body>

    <table width="750" border="0">
        <tr>
            <td class="title">
                Laporan Transaksi
            </td>
        </tr>
    </table>
    <table width="750" border="0">
        <tr>
            <td class="tanggal">
                Dari tanggal <?= mediumdate_indo($this->session->userdata('tanggal_mulai')) ?> Sampai Tanggal <?= mediumdate_indo($this->session->userdata('tanggal_ahir')); ?>
            </td>
        </tr>
    </table>
    <br><br>
    <table id="table">
        <tr>
            <th>Tanggal Masuk</th>
            <th>Kode Transaksi</th>
            <th>Konsumen</th>
            <th>Paket</th>
            <th>Berat (KG)</th>
            <th>Status</th>
            <th>Grand Total</th>
        </tr>
        <?php foreach ($laporan as $l) : ?>
            <?php if ($l->status == "Selesai") { ?>
                <tr>
                    <td><?= mediumdate_indo($l->tgl_masuk); ?></td>
                    <td><?= $l->kode_transaksi; ?></td>
                    <td><?= $l->nama_konsumen; ?></td>
                    <td><?= $l->nama_paket; ?></td>
                    <td><?= $l->berat; ?>Kg</td>
                    <td><?= $l->status; ?></td>
                    <td><?= "Rp. " . number_format($l->grand_total, 0, '.', '.'); ?></td>
                </tr>

            <?php } else { ?>

            <?php } ?>
        <?php endforeach; ?>
        <tr>
            <td scope="row" colspan="6" style="text-align:center ; font-weight:bold; font-size: 13px;background-color: #f9f8f8;">Grand Total</td>
            <td style="font-weight:bold; font-size: 13px;background-color: #f9f8f8;"><?= "Rp. " . number_format($grandtotransaksi['grand_total'], 0, '.', '.'); ?></td>
        </tr>
    </table>

</body>

</html>