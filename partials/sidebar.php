<div id="layoutSidenav_nav">
  <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
      <div class="sb-sidenav-menu">
          <div class="nav">
              <div class="sb-sidenav-menu-heading">Sidebar Menu</div>
              <!-- Dashboard -->
              <a class="nav-link" href="index.php">
                  <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                  Dashboard
              </a>
              <!-- Data Baranag -->
              <a class="nav-link" href="databarang.php">
                  <div class="sb-nav-link-icon"><i class="fas fa-dolly-flatbed"></i></div>
                  Data Barang
              </a>
              <!-- Baranag Masuk -->
              <a class="nav-link" href="barangmasuk.php">
                  <div class="sb-nav-link-icon"><i class="fas fa-arrow-alt-circle-right"></i></div>
                  Barang Masuk
              </a>
              <!-- Baranag Keluar -->
              <a class="nav-link" href="barangkeluar.php">
                  <div class="sb-nav-link-icon"><i class="fas fa-arrow-alt-circle-left"></i></div>
                  Barang Keluar
              </a>
              <!-- Laporan -->
              <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                  <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                  Laporan
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                  <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="laporankeluar.php">Pengeluaran</a>
                      <a class="nav-link" href="laporanmasuk.php">Pemasukan</a>
                  </nav>
              </div>
          </div>
      </div>
      <div class="sb-sidenav-footer">
          <div class="small">Logged in as:</div>
          <?= $_SESSION['username'] ?>
      </div>
  </nav>
</div>