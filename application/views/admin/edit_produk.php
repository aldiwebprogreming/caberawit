

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Data Produk</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <div class="card">
        <div class="card-header ui-sortable-handle" style="cursor: move;">
          <h3 class="card-title">
            <i class="fas fa-chart-pie mr-1"></i>
            Data produk
          </h3>

        </div><!-- /.card-header -->
        <div class="card-body">
          <!-- Button trigger modal -->

          <div class="row">
            <div class="col-sm-6">
              <form method="post" action="<?= base_url('admin/act_edit_produk') ?>" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $produk['id'] ?>">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Produk</label>
                  <input type="text" name="nama_produk" class="form-control" value="<?= $produk['nama_produk'] ?>">
                </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">Keterangan Produk</label>
                  <textarea id="summernote" name="keterangan">
                   <?= $produk['keterangan'] ?>
                 </textarea>
               </div>

               

               <div class="form-group">
                <label for="exampleInputEmail1">Kategori Produk</label>
                <select class="form-control" name="kategori_produk">
                  <option><?= $produk['kategori'] ?></option>
                  <?php foreach ($kategori as $data) { ?>
                    <option><?= $data['nama_kategori'] ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Satuan Harga</label>
                <select class="form-control" name="satuan_harga">
                  <option><?= $produk['satuan_harga'] ?></option>
                  <option>-- Pilih Satuan Harga --</option>
                  <?php foreach ($satuan_harga as $data) {  ?>
                    <option><?= $data['nama'] ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Harga Produk</label>
                <input type="numbar" name="harga" class="form-control" value="<?= $produk['harga'] ?>">
              </div>




              <div class="form-group">
                <label for="exampleInputEmail1">Gambar</label>
                <input type="file" class="form-control" name="img" id="inputFile">


                <img id="imgView" src="<?= base_url('assets/produk/') ?>/<?= $produk['gambar'] ?>" alt="img" class="img-thumbnail mt-2" style="height: 200px; width: 200px;">
              </div>

              <input type="submit" name="edit" class="btn btn-primary" value="Edit produk">

            </form>
          </div>
        </div>

      </div>
    </div><!-- /.card-body -->
  </div>

</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
  $("#inputFile").change(function(event) {  
    fadeInAdd();
    getURL(this);    
  });

  $("#inputFile").on('click',function(event){
    fadeInAdd();
  });

  function getURL(input) {    
    if (input.files && input.files[0]) {   
      var reader = new FileReader();
      var filename = $("#inputFile").val();
      filename = filename.substring(filename.lastIndexOf('\\')+1);
      reader.onload = function(e) {
        debugger;      
        $('#imgView').attr('src', e.target.result);
        $('#imgView').hide();
        $('#imgView').fadeIn(500);      
        $('.custom-file-label').text(filename);             
      }
      reader.readAsDataURL(input.files[0]);    
    }
    $(".alert").removeClass("loadAnimate").hide();
  }

  function fadeInAdd(){
    fadeInAlert();  
  }
  function fadeInAlert(text){
    $(".alert").text(text).addClass("loadAnimate");  
  }
</script>
