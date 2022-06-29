 <!-- Page Header Start -->
 <div class="container-fluid page-header py-6 my-6 mt-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4">Detail Produk <?= $produk ?></h1>
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

           <!--  <h3 class="text-center">Produk Kami</h3> -->

           <div class="row">
            <div class="col-sm-4">
                <img src="<?= base_url('assets/produk/') ?><?= $det_produk['gambar'] ?>" class="img-fluid" alt="...">
            </div>

            <div class="col-sm-8">
                <div class="shadow-sm p-3 mb-5 bg-white rounded">
                    <h4><?= $det_produk['nama_produk'] ?></h4>
                    <hr>
                    <?= $det_produk['keterangan'] ?>
                    <hr>
                    <h4>Harga :  <?= "Rp " . number_format($det_produk['harga'],0,',','.'); ?> / Lembar</h4>
                    <a href="https://wa.me/6281362323357/?text=Hi,%20Admin." target="_blank" class="btn btn-success">Pesan Sekarang Juga <i class="fab fa-whatsapp"></i></a>  <a href="<?= base_url('index/produk-kami') ?>" class="btn btn-primary">Lihat Produk Lainnya <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>



    </div>
</div>
</div>
</div>
</div>

    <!-- Produk End -->