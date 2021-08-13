<?php 
include "koneksi.php";
session_start();

if (!$_SESSION['username'] && !$_SESSION['login']) {
    header("Location:login.php");
}

$sql = "SELECT tb_barang.nama_barang, tb_keluar.qty, tb_keluar.penerima, tb_keluar.tanggal
FROM tb_keluar
INNER JOIN tb_barang ON tb_keluar.id_barang = tb_barang.id_barang
";
$res = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "partials/head.php" ?>
    </head>
    <body class="sb-nav-fixed">
        <!-- Navbar -->
        <?php include "partials/navbar.php" ?>

        <div id="layoutSidenav">
            <!-- Sidebar -->
            <?php include "partials/sidebar.php" ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Laporan Keluar</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"><a href="index.php">Dashboard</a> / Laporan / Pengeluaran</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Laporan Keluar
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Qty</th>
                                            <th>Penerima</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Qty</th>
                                            <th>Penerima</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </tfoot>
                                    <?php if (mysqli_num_rows($res) > 0): ?>
                                    <tbody>
                                        <?php $index = 1; ?>
                                        <?php while($row = mysqli_fetch_assoc($res)): ?>
                                        <tr>
                                            <td><?= $index ?></td>
                                            <td><?= $row["nama_barang"] ?></td>
                                            <td><?= $row["qty"] ?></td>
                                            <td><?= $row["penerima"] ?></td>
                                            <td>
                                                <?= $row["tanggal"] ?>
                                            </td>
                                        </tr>
                                        <?php $index++ ?>
                                        <?php endwhile; ?>
                                    </tbody>
                                    <?php endif; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

                <!-- Footer -->
                <?php include "partials/footer.php" ?>
            </div>
        </div>

        <!-- Script -->
        <?php include "partials/script.php" ?>
    </body>
</html>
