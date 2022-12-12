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
                <form action="<?= base_url('about/simpan'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="judul_about" class="form-control" required placeholder="Input Judul About">
                    </div>
                    <div class="form-group">
                        <textarea name="deskripsi_about" class="form-control" id="" cols="30" rows="10" placeholder="Input Deskripsi About" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name="gambar_about" class="form-control" required>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-info ">Simpan</button>
                        <a href="<?= base_url('about'); ?>" class="btn btn-secondary ml-3">Batal</a>
                    </div>
                </form>
            </div>
        </div>


    </div>
</body>

</html>