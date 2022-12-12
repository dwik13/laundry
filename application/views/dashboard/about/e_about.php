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
                <form action="<?= base_url('about/ubah'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="id_about" value="<?= $about['id_about'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="judul_about" value="<?= $about['judul_about'] ?>" class="form-control" placeholder="Input Judul about">
                    </div>
                    <div class="form-group">
                        <textarea name="deskripsi_about" class="form-control" id="" cols="20" rows="5" placeholder="Input Deskripsi about"><?= $about['deskripsi_about'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name="gambar_about" class="form-control">
                        <img src="<?= base_url('assets/images/about/' . $about['gambar_about']) ?>" alt="" class="mt-4" width="300px"><br>
                        <small class="text-danger">Format gambar (jpg | png) Ukuran gambar 1440 pixel x 500 pixel</small>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-info ">Update</button>
                        <a href="<?= base_url('about'); ?>" class="btn btn-secondary ml-3">Batal</a>
                    </div>
                </form>
            </div>
        </div>


    </div>
</body>

</html>