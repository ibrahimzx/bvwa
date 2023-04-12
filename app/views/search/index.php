  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Advanced Search</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
   
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Seaching.. </h3>
        </div>
        <div class="card-body">
          Cari data apapun mulai dari Buku, Film dan E-Paper
          <form method="POST" action="">
            <div class="input-group mb-3 mt-2">
              <input type="text" class="form-control" placeholder="Cari Data.. " name="cari">
            </div>
            <div class="input-group" style="width: 30%;">
              <select class="custom-select" name="kategori" required>
                <option value="" selected disabled>Pilih Kategori</option>
                <option value="buku">Buku</option>
                <option value="film">Film</option>
                <option value="paper">Paper</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3" name="gass">Search</button>
          </form>

          <?php if(!empty($data['hasil'])): ?>

              <?php if($data['kategori'] == 'buku'): ?>
                <table class='table table-bordered mt-4'>
                      <thead>                  
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Judul</th>
                            <th>Penerbit</th>
                            <th>Pengarang</th>
                            <th>Tahun</th>
                            <th>Harga</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no=1; ?> 
                        <?php foreach ($data['hasil'] as $row) :?>
                        <tr>
                          <td><?= $no; ?></td>
                          <td><?= $row['judul'];?></td>
                          <td><?= $row['penerbit'];?></td>
                          <td><?= $row['pengarang'];?></td>
                          <td><?= $row['tahun'];?></td>
                          <td><?= $row['harga'];?></td>
                        </tr>
                        <?php $no++; endforeach; ?>
                      </tbody>
              </table>
            <?php elseif($data['kategori'] == 'film'): ?>
              <table class='table table-bordered mt-4'>
                      <thead>                  
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Judul</th>
                            <th>Sutradara</th>
                            <th>Tahun</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no=1; ?> 
                        <?php foreach ($data['hasil'] as $row) :?>
                        <tr>
                          <td><?= $no; ?></td>
                          <td><?= $row['judul'];?></td>
                          <td><?= $row['sutradara'];?></td>
                          <td><?= $row['tahun'];?></td>
                        </tr>
                        <?php $no++; endforeach; ?>
                      </tbody>
              </table>
            <?php elseif($data['kategori'] == 'paper'): ?>
                <table class='table table-bordered mt-4'>
                      <thead>                  
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Judul paper</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $no=1; ?> 
                        <?php foreach ($data['hasil'] as $row) :?>
                        <tr>
                          <td><?= $no; ?></td>
                          <td><?= $row['judul'];?></td>
                        </tr>
                        <?php $no++; endforeach; ?>
                      </tbody>
            <?php endif; ?>
                </table>
          <?php endif; ?>
        </div>

        <!-- /.card-body -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
  <!-- Actual search box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

