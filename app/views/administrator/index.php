  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile Saya</h1>
          </div>
        </div>
      </div>
    </section> -->

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Administrator Area Only!</h3>
        </div>
       <div class="card-body box-profile">

                <h3 class="profile-username text-center">Fitur khusus admin</h3>

                <p class="text-muted text-center">Cek Konfigurasi Server</p> 
                <div class="text-center" id="config">
                  <form action="" method="POST">
                    <button type="submit" class="btn btn-primary mr-3 mx-auto mb-2" name="server">Print Detail Server</button>
                    <button class="btn btn-success mr-3 mx-auto mb-2" name="db">Print Database Version</button>
                    <button class="btn btn-danger mr-3 mx-auto mb-2" name="web">Print config WebServer</button>
                  </form>
                  <div class="print">
                    <?php if(isset($data['server']) == true): ?>
                      <h3>Detail Server</h3>
                      <div style="white-space: pre-line ;">
                        <b>IP server : 108.92.78.222</b>
                        <b>Port : 80</b>
                        <b>Kernel : Linux TOTOLINK 3.4.113 #1 Wed Sep 16 21:07:20 CST 2020 mips GNU/Linux</b>
                        <b>Webserver : Nginx</b>
                        <b>PHP Version : PHP 8.1.2</b>
                        <b>GCC version : 4.4.7 (GCC)</b>
                        <b>User: www-data</b>
                      </div>
                    <?php elseif(isset($data['db']) == true): ?>
                      <h3>Detail Database</h3>
                      <div style="white-space: pre-line ;">
                        <b>User : xpl0dec@localhost</b>
                        <b>Database : bug-hunter</b>
                        <b>Version : 10.4.7-MariaDB </b>
                        <b>Dir : /var/lib/mysql/</b>
                        <b>Hostname: cp03-wa.privatesystems.net</b>
                        <b>SymlinK : DISABLED</b>
                        <b>Machine: x86_64</b>
                      </div>
                    <?php elseif(isset($data['web']) == true): ?>   
                      <h1>Config Webserver</h1>
                       <div style="white-space: pre-line ;">
                        <p>
                          Server Version: Apache/2.4.23 (linux64) OpenSSL/1.0.2h PHP/8.1
                          Server MPM: Linux64
                          Apache Lounge VC11 Server built: Jul 7 2016 11:13:22
                          Current Time: Wednesday, 29-Mar-2023 20:38:26 SE Asia Standard Time
                          Restart Time: Wednesday, 15-Mar-2023 11:40:37 SE Asia Standard Time
                          Parent Server Config. Generation: 1
                          Parent Server MPM Generation: 3
                          Server uptime: 14 days 8 hours 57 minutes 48 seconds
                          Server load: -1.00 -1.00 -1.00
                          Total accesses: 446260 - Total Traffic: 20.2 GB
                          .359 requests/sec - 17.0 kB/second - 47.4 kB/request
                          2 requests currently being processed, 1498 idle workers

                          &lt;VirtualHost _default_:443&gt;
                             TransferLog "C:/xampp/apache/logs/access.log"
                             CustomLog "C:/xampp/apache/logs/ssl_request.log" "%t %h %{SSL_PROTOCOL}x %{SSL_CIPHER}x \"%r\" %b"
                          &lt;/VirtualHost&gt;
                        </p>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

