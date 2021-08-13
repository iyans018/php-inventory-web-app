<?php 
include "koneksi.php";
session_start();

if (!$_SESSION['username'] && !$_SESSION['login']) {
    header("Location:login.php");
}

$sql = "SELECT * FROM tb_barang";
$res = mysqli_query($conn, $sql);

if (isset($_POST["tambah"])) {
    $nama_barang = $_POST["nama_barang"];
    $deskripsi = $_POST["deskripsi"];
    $stock = $_POST["stock"];

    $sql_tambah = "INSERT INTO tb_barang (nama_barang, deskripsi, stock) VALUES ('$nama_barang', '$deskripsi', $stock)";

    if (mysqli_query($conn, $sql_tambah)) {
        header("Location:databarang.php");
    } else {
        echo "Gagal membuat data " . mysqli_error($conn);
    }
}

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
                        <h1 class="mt-4">Data Barang</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"><a href="index.php">Dashboard</a> / Data Barang</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahBarangModal">
                                    Tambah Barang
                                </button>

                                <!-- <i class="fas fa-table me-1"></i>
                                Data Barang -->
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Deskripsi</th>
                                            <th>Stock</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Deskripsi</th>
                                            <th>Stock</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <?php if (mysqli_num_rows($res) > 0): ?>
                                    <tbody>
                                        <?php $index = 1; ?>
                                        <?php while($row = mysqli_fetch_assoc($res)): ?>
                                        <tr>
                                            <td><?= $index ?></td>
                                            <td><?= $row["nama_barang"] ?></td>
                                            <td><?= $row["deskripsi"] ?></td>
                                            <td><?= $row["stock"] ?></td>
                                            <td>
                                                <a href="hapusdatabarang.php?id_barang=<?= $row['id_barang'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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

                <!-- Modal Tambah -->
                <div class="modal fade" id="tambahBarangModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="databarang.php" method="post">
                                <div class="modal-body">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" name="nama_barang" class="form-control">
                                    <br>
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" name="deskripsi" class="form-control">
                                    <br>
                                    <label for="stock">Stock</label>
                                    <input type="text" name="stock" class="form-control">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button name="tambah" type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <?php include "partials/footer.php" ?>
            </div>
        </div>

        <!-- Script -->
        <?php include "partials/script.php" ?>
    </body>
</html>
