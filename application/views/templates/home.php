<div class="container">
    <div class="row mt-5 " data-aos="fade-up" data-aos-duration="1000">

        <?php foreach ($about as $a) { ?>
            <div class="col-md-4 kotak1">
                <img class="set-image mb-4 " src="<?= base_url('assets/images/about/' . $a->gambar_about) ?> " alt="">
            </div>
            <div class="col-md-8" style="padding-left: 30px;">
                <h3><?= $a->judul_about ?></h3>
                <div class="paragraf">
                    <p>
                        <?= $a->deskripsi_about ?>
                    </p>
                </div>

            </div>
        <?php } ?>

    </div>
    <script>
        var paragraf = document.getElementsByClassName("paragraf");
        setInterval(function() {
            paragraf[0].style.color = "grey";

            setTimeout(function() {
                paragraf[0].style.color = "black";
            }, 600)
        }, 1000)
    </script>

    <div class="row mt-5 mb-3" data-aos="fade-up" data-aos-duration="1000">
        <div class="col-md-12">
            <h3>Jasa Layanan Kami</h3>

            <div class="mt-5 position">
                <div class="group">
                    <div class="col-md-4 kotak1 group913">
                        <img src="<?= base_url('assets/images/icon/Group913.png') ?> " class="img-group" width="400px" alt="">
                    </div>
                    <div class="col-md-4 kotak1 group912">
                        <img src="<?= base_url('assets/images/icon/Group912.png') ?>  " width="400px" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-5" data-aos="fade-up" data-aos-duration="1000">
        <div class="col-md-12">
            <div class="position">
                <div class="group">
                    <div class="col-md-4 kotak1 group915">
                        <img src="<?= base_url('assets/images/icon/Group915.png') ?> " class="img-group" width="400px" alt="">
                    </div>
                    <div class="col-md-4 kotak1 group914">
                        <img src="<?= base_url('assets/images/icon/Group914.png') ?>  " width="400px" alt="">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row mb-5" data-aos="fade-up" data-aos-duration="1000">
        <div class="col-md-12">
            <h3 class="mt-4">Mengapa Memilih Laundry Kami</h3>
        </div>
        <div class="position mt-4">
            <div class="col-md-4">
                <img src="<?= base_url('assets/images/icon/Frame28.png') ?>" width="880" alt="">
            </div>
        </div>
    </div>





    <div class="row mt-5 mb-5" data-aos="fade-up" data-aos-duration="1000">
        <div class="col-md-12">
            <h3 class="mt-4">Daftar Harga</h3>
            <table class="table table-striped table-bordered mt-4">
                <thead>
                    <tr class="th-warna">
                        <th scope="col">No. </th>
                        <th scope="col">Nama Paket</th>
                        <th scope="col">Harga Paket</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($paket as $p) : ?>
                        <tr>

                            <th scope="row"><?= $i; ?></th>
                            <td><?= $p->nama_paket ?></td>
                            <td><?= "Rp. " . number_format($p->harga_paket, 0, '.', '.'); ?></td>
                        </tr>

                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>