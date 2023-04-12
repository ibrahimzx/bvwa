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
              <form role="form" action="<?= base_url; ?>/paper/tambahPaper" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="uploadFolder" value="/bug-hunter/public/dist/files/">
                <div class="card-body">
                  <div class="form-group">
                    <label >Judul Paper</label>
                    <input type="text" class="form-control" placeholder="masukkan judul film..." name="judul" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Paper</label>
                    <div class="input-group">
                      <input type="file" class="form-control" name="paper" required>
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