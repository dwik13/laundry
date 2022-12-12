<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
    <style>
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

        #table tr:nth-child(even) {
            background-color: #f9f8f8;
        }

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

        hr {
            border: 0;
            border-top: 2px solid black;
        }
    </style>
</head>

<body>

    <table>
        <tr>
            <td width="400">
                <h2>Laundry Online</h2>
            </td>
            <td>
                <h3>Invoice</h3>
            </td>
        </tr>
        <tr>
            <td>Alamat: Gadingrejo</td>
        </tr>
        <tr>
            <td>Telp: 082789125090</td>
        </tr>
        <tr>
            <td>Email: dwikhusnul632@gmail.com</td>
        </tr>
    </table>

    <hr><br>

    <table>
        <tr>
            <td width="80">Konsumen</td>
            <td width="240"><?= $transaksi['nama_konsumen']; ?></td>
            <td width="80">Kode Transaksi</td>
            <td><?= $transaksi['kode_konsumen']; ?></td>
        </tr>

        <tr>
            <td width="80"></td>
            <td width="250"><?= $transaksi['alamat_konsumen']; ?></td>
            <td width="80">Tanggal Masuk</td>
            <td><?= $transaksi['tgl_masuk']; ?></td>
        </tr>

        <tr>
            <td width="80"></td>
            <td width="250"><?= $transaksi['no_telp']; ?></td>

            <?php if ($transaksi['tgl_ambil'] != "0000-00-00 00:00:00") { ?>
                <td width="80">Tanggal Ambil</td>
                <td><?= $transaksi['tgl_ambil']; ?></td>
            <?php } else { ?>
                <td width="80">Tanggal Ambil</td>
                <td style="color:red ;">-</td>
            <?php } ?>
        </tr>
    </table>
    <table id="table"><br><br>
        <tr>
            <th>Paket Laundry</th>
            <th>Berat / KG</th>
            <th>Harga</th>
            <th>Sub Total</th>
        </tr>
        <tr>
            <td scope="row"><?= $transaksi['nama_paket'] ?></td>
            <td><?= $transaksi['berat'] ?></td>
            <td><?= "Rp. " . number_format($transaksi['harga_paket'], 0, '.', '.'); ?></td>
            <td><?= "Rp. " . number_format($transaksi['grand_total'], 0, '.', '.'); ?></td>
        </tr>
        <tr>
            <td scope="row" colspan="3" style="text-align:center ; font-weight:bold; font-size: 13px;background-color: #f9f8f8;">Grand Total</td>
            <td style="font-weight:bold; font-size: 13px;background-color: #f9f8f8;"><?= "Rp. " . number_format($transaksi['grand_total'], 0, '.', '.'); ?></td>
        </tr>
    </table>

    <h4>Keterangan</h4>
    <ol>
        <li>Pengambilan cucian harus membawa nota</li>
        <li>Cucian luntur bukan tanggung jawab kami</li>
        <li>Hitung dan periksa sebelum pergi</li>
        <li>Klaim kekurangan/kehilangan cucian setelah meninggalkan laundry tidak dilayani</li>
    </ol>

</body>

</html>