  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Utama</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


      <div class="mb-5">
        <form method="POST" action="<?= base_url; ?>/home/index">          
             <input type="hidden" name="url" value="ipinfo.io/103.52.6.2">  
              <span class="input-group-btn">
                <button class="btn btn-success" type="submit" name="cekIP"><span class="glyphicon glyphicon-search" aria-hidden="true">
                </span> Check IP Address!</button>
              </span>
        </form>

              <?php
                if(!empty($data['dataku'])) {
                  echo "<div class='card' id='ip'><div class='card-body'>";
                  echo "<h1>Detail your IP address</h1>";
                  echo "<p>IP Address : {$data['dataku']['ip']}</p>";
                  echo "<p>Negara : {$data['dataku']['region']}</p>";
                  echo "<p>Kota : {$data['dataku']['city']}</p>";
                  echo "<p>Country : {$data['dataku']['country']}</p>";
                  echo "<p>ISP : {$data['dataku']['org']}</p>";
                  echo "<p>Timezone : {$data['dataku']['timezone']}</p>";
                  echo "<button id='close' class='btn btn-danger'>close</button>";
                  echo "</div></div>";
                }
               ?>
      </div>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Hello <?= $_SESSION['nama']; ?></h3>
        </div>
        <div class="card-body">
          Selamat datang bughunter!
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Happy hunting !!
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
  <!-- Actual search box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

