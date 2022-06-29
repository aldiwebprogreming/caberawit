

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Admin</h1>
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
            Data Admin
          </h3>

        </div><!-- /.card-header -->
        <div class="card-body">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#tambahadmin">
            Tambah Admin
          </button>

          <!-- Modal -->
          <div class="modal fade" id="tambahadmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah admin</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                 <form method="post" action="<?= base_url('admin/tambah_admin') ?>" enctype="multipart/form-data">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" required="" name="username" placeholder="Masukan username anda">
                  </div>

                  

                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" required="" name="pass" placeholder="Masukan password" minlength="6">
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <input type="submit" name="kirim" class="btn btn-primary" value="Simpan Admin">

                </form>
              </div>
            </div>
          </div>
        </div>
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Username</th>

              <th>Date</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach($admin as $data){ ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['username'] ?></td>
                <td><?= $data['date'] ?></td>
                <!-- Button trigger modal -->
                <td>
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $data['id'] ?>">
                   Hapus
                 </button>
                 
                 <!-- Modal -->
                 <div class="modal fade" id="hapus<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <h4>Apakah anda ingin menghapus data ini?</h4>
                        <form method="post" action="<?= base_url('admin/hapus_admin') ?>">
                          <input type="hidden" name="id" value="<?= $data['id'] ?>">

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <input type="submit" class="btn btn-primary" submit="Hapus">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                
              </td>
            </tr>
          <?php } ?>

        </tfoot>
      </table>
    </div>
  </div><!-- /.card-body -->
</div>

</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
