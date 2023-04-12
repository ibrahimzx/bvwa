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
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?= base_url; ?>/film/updateFilm" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['film']['id']; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label >Judul</label>
                    <input type="text" class="form-control" placeholder="masukkan judul film..." name="judul" value="<?= $data['film']['judul'];?>">
                  </div>
                  <div class="form-group">
                    <label >Sutradara</label>
                    <input type="text" class="form-control" placeholder="masukkan sutradara film..." name="sutradara" value="<?= $data['film']['sutradara'];?>">
                  </div>
                  <div class="form-group">
                    <label >Tahun</label>
                    <input type="text" class="form-control" placeholder="masukkan tahun film..." name="tahun" value="<?= $data['film']['tahun'];?>">
                  </div>
                  <div class="form-group">
                    <label >Genre</label>
                    <select class="form-control" name="kategori_id">
                        <option value="">Pilih</option>
                         <?php foreach ($data['kategori'] as $row) :?>
                        <option value="<?= $row['id']; ?>" <?php if($data['film']['kategori_id'] == $row['id']) { echo "selected"; } ?>><?= $row['nama_kategori']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->