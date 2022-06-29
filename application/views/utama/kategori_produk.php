 <!-- Page Header Start -->
 <div class="container-fluid page-header py-6 my-6 mt-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4">Produk <?= $kategori ?></h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Produk kami</li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Tentang kami</a></li>

            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->



<!-- Produk Start -->
<div class="container-xxl py-2">
    <div class="container">
        <div class="row g-2">

            <h3 class="text-center">Produk <?= $kategori ?></h3>


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



        </div>
    </div>
</div>
</div>
</div>

    <!-- Produk End -->