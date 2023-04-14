  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pelanggan kami</h1>
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
          <h3 class="card-title">Data pelanggan kami</h3> 
        </div>
        <div class="card-body">
        
      <form action="<?= base_url; ?>/user/cari" method="post">
 <div class="row mb-3">
    <div class="col-lg-6">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="" name="key" >
    <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit">Cari Data</button>
          <a class="btn btn-outline-danger" href="<?= base_url; ?>/user" >Reset</a>
    </div>
  </div>

  </div>
</div>
    </form>
          <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Username</th>
                    </tr>
                  </thead>
                  <tbody id="tbody">
                    <!-- ambil data dari rest api -->
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


  <footer class="main-footer">
    <strong>Copyright &copy;2023 Bhineka Tech All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url; ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url; ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url; ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url; ?>/dist/js/demo.js"></script>
<script>


    String.prototype.escape = function() {

      var replaceXss = {
        '&': '&amp;',
        '>': '&gt;',
        '<': '&lt;'
      }

      return this.replace(/[&<>]/g, function(tag) {
        return replaceXss[tag] || tag;
      });
    }

    var tbody = $('#tbody');
    $.ajax ({
      url: 'http://localhost/bug-hunter/public/api/parseUser',
      method: 'GET',
      dataType: 'json',
      headers: {
        'Authorization': 'YmgxbjNrNC10M2NoLWFwaQ=='
      },
      success: function(data) {
        $.each(data['data'], function(index, item) {
          tbody.append(`<tr><td>${index + 1}</td><td>${item.username.escape()}</td></tr>`);
        });
      }
    });


</script>
</body>
</html>

