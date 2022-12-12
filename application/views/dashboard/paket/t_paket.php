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
                <form action="<?= base_url('paket/simpan'); ?>" method="post">
                    <div class="form-group">
                        <input type="text" name="kode_paket" value="<?= $kode_paket; ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" name="nama_paket" class="form-control" placeholder="Masukan nama paket" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="harga_paket" class="form-control" placeholder="Masukan harga paket" required>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-info ">Simpan</button>
                        <a href="<?= base_url('paket'); ?>" class="btn btn-secondary ml-3">Batal</a>
                    </div>
                </form>
            </div>
        </div>


    </div>
</body>

</html>