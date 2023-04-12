  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Film</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<div class="row">
    <div class="col-sm-12">
      <?php
        Flasher::Message();
      ?>
    </div>
  </div>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?= $data['title'] ?></h3> <div class="btn-group float-right"><a href="<?= base_url; ?>/film/laporan" class="btn float-right btn-xs btn btn-info">Laporan film</a><a href="<?= base_url; ?>/film/lihatlaporan" class="btn float-right btn-xs btn btn-warning">Lihat Laporan film</a></div>
        </div>
        <div class="card-body">
        
      <form action="<?= base_url; ?>/film/cari" method="post">
 <div class="row mb-3">
    <div class="col-lg-6">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="" name="key" >
    <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit">Cari Data</button>
          <a class="btn btn-outline-danger" href="<?= base_url; ?>/film" >Reset</a>
    </div>
  </div>

  </div>
</div>
    </form>
          <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Judul</th>
                      <th>Sutradara</th>
                      <th>Tahun</th>
                      <th>Genre</th>
                      <th>Harga</th>
                      <th style="width: 150px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; ?> 
                    <?php foreach ($data['film'] as $row) :?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $row['judul'];?></td>
                      <td><?= $row['sutradara'];?></td>
                      <td><?= $row['tahun'];?></td>
                      <td><div class="badge badge-warning"><?= $row['nama_kategori'];?></div></td>
                      <td><?= Flasher::rupiah($row['harga']);?></td>
                      <td>
                        <?php if(in_array($row['id_film'], $data['pembelian'])): ?>
                          <a href="#" disabled="disabled" class="badge badge-danger">Terbeli</a>
                        <?php else: ?>
                          <form method="POST" action="<?= base_url ?>/cart/beliFilm/<?= $row['id_film']; ?>">
                            <input type="hidden" name="harga" value="<?= $row['harga'] ?>">
                            <button type="submit" name="beli" class="badge badge-success" onclick="if(!confirm('Yakin membeli film ini??')){ return false }">Beli</button>
                          </form> 

                          <?php if(!in_array($row['id_film'], $data['cart'])): ?>
                            <a href="<?= base_url; ?>/cart/addFilm/<?= $row['id_film'] ?>" class="badge badge-warning">Add to Cart</a>
                          <?php else: ?>
                            <a href="<?= base_url; ?>/cart/addFilm/<?= $row['id_film'] ?>" class="badge badge-success">Ditambahkan ke cart</a>
                          <?php endif; ?>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <?php $no++; endforeach; ?>
                  </tbody>
                </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

