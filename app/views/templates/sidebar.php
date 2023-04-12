  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Bhitech Vulnerable Web Apps</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Developed by xpl0dec</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url; ?>/home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link" inactive >
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
               Saldo Anda : <?= Flasher::rupiah($_SESSION['saldo']); ?> 
              </p>
            </a>
          </li>
          <li class="nav-header">Data</li>
          <li class="nav-item">
            <a href="<?= base_url; ?>/kategori" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url; ?>/search" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Search
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url; ?>/buku" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Buku
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url; ?>/paper" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
               E-Paper
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url; ?>/film" class="nav-link">
              <i class="nav-icon fas fa-tv"></i>
              <p>
                Film
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url; ?>/cart/<?= $_SESSION['id_user']; ?>" class="nav-link">
              <i class="nav-icon fas fa-shopping-basket"></i>
              <p>
                Keranjang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url; ?>/user" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Pelanggan
              </p>
            </a>
          </li>

          <?php error_reporting(0); if(isset($_COOKIE['hak_akses']) && $_COOKIE['hak_akses'] == 'admin' || $_COOKIE['hak_akses'] == 'administrator'): ?>
          <li class="nav-item">
            <a href="<?= base_url; ?>/FiturAdmin" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Fitur Administrator
              </p>
            </a>
          </li>
        <?php endif; ?>

          <li class="nav-header">Extra</li>
          <li class="nav-item">
            <a href="<?= base_url; ?>/about" class="nav-link">
              <i class="nav-icon fas fa-code"></i>
              <p>
                About Me
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>