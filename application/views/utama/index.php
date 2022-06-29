
<!-- Carousel Start -->
<div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="<?= base_url('assets/') ?>img/cr2.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">

                            <div class="col-lg-7">
                                <h1 class="display-2 text-light mb-5 animated slideInDown">Cetak dengan harga murah</h1>
                                <a href="<?= base_url('index/produk-kami') ?>" class="btn btn-primary py-sm-3 px-sm-5">Lihat Produk</a>
                                <a href="" class="btn btn-light py-sm-3 px-sm-5 ms-3">Hubungi Kami</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="<?= base_url('assets/') ?>img/cr1.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <h1 class="display-2 text-light mb-5 animated slideInDown">Cetak dengan harga murah</h1>
                                <a href="<?= base_url('index/produk-kami') ?>" class="btn btn-primary py-sm-3 px-sm-5">Lihat Produk</a>
                                <a href="" class="btn btn-light py-sm-3 px-sm-5 ms-3">Hubungi Kami</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
    data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
</button>
</div>
</div>
<!-- Carousel End -->

<div class="container-fluid facts py-5 pt-lg-0">
    <div class="container py-5 pt-lg-0">
        <div class="row gx-0">
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px;">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-lg-square bg-primary">
                            <i class="fa fa-print text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5>Cetak Mudah </h5>
                            <span>Menerima segala cetakan denan kualitas terbaik</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px;">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-lg-square bg-primary">
                            <i class="fa fa-user text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5>Harga Murah</h5>
                            <span>Harga bersahabat bagi usaha UMKM yang ingin meningkatkan branding usaha</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                <div class="bg-white shadow d-flex align-items-center h-100 p-4" style="min-height: 150px;">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-lg-square bg-primary">
                            <i class="fa fa-map text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5>Pengiriman Mudah</h5>
                            <span>Menerima orderan seluruh Indonesia dengan pengiriman yang mudah dan cepat</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <h5 class="text-primary">Produk Unggulan Kami</h5>
        <hr>

        <?php foreach($produk as $data) { ?>
            <div class="col-sm-3 col-6 mt-4 rounded">
                <div class="card" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <img src="<?= base_url('assets/produk/') ?><?= $data['gambar'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?= $data['nama_produk'] ?></h5>
                        <p class="text-center text-danger" style="font-weight: bold;"><?= "Rp " . number_format($data['harga'],0,',','.'); ?> / <?= $data['satuan_harga'] ?></p>
                        <center>
                            <a href="<?= base_url('index/detail-produk/') ?><?= $data['slug'] ?>" class="btn btn-primary btn-block btn-sm">Lihat Detail</a>
                        </center>
                    </div>
                </div>
            </div>
        <?php } ?>


        <br>
        <center>
            <a href="<?= base_url('index/produk-kami') ?>" class="btn btn-primary mt-5">Lihat Produk Lainnya <i class="fa fa-arrow-right"></i></a>
        </center>


    </div>
</div>