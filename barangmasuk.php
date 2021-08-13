<?php 
include "koneksi.php";
session_start();

if (!$_SESSION['username'] && !$_SESSION['login']) {
    header("Location:login.php");
}

$sql = "SELECT * FROM tb_barang";
$res = mysqli_query($conn, $sql);

if (isset($_POST["tambah"])) {
    $id_barang = $_POST["id_barang"];
    $qty = $_POST["qty"];
    $penerima = $_POST["penerima"];

    $cekstock = mysqli_query($conn, "SELECT * FROM tb_barang WHERE id_barang='$id_barang'");
    $ambildata = mysqli_fetch_array($cekstock);

    $stock = $ambildata["stock"];
    $stock_baru = $stock + $qty;

    $tambahMasuk = mysqli_query($conn, "INSERT INTO tb_masuk (id_barang, qty, penerima) VALUES ('$id_barang','$qty','$penerima')");
    $updateStock = mysqli_query($conn, "UPDATE tb_barang SET stock=$stock_baru WHERE id_barang='$id_barang'");
    if ($tambahMasuk && $updateStock) {
        header("Location:databarang.php");
    } else {
        echo "Gagal " . mysqli_error($conn);
    }
    
    echo $stock;
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
                        <h1 class="mt-4">Barang Masuk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"><a href="index.php">Dashboard</a> / Barang Masuk</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Barang Masuk
                            </div>
                            <div class="card-body">
                                <form action="barangmasuk.php" method="post">
                                    <div class="mb-3">
                                        <label for="id_barang" class="form-label">Barang</label>
                                        <select name="id_barang" class="form-select">
                                        <?php if (mysqli_num_rows($res) > 0) { ?>
                                            <?php while($row = mysqli_fetch_assoc($res)): ?>
                                            <option value="<?= $row["id_barang"] ?>"><?= $row["nama_barang"] ?></option>
                                            <?php endwhile; ?>
                                        <?php } else { ?>
                                            <option value="">Kosong</option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="qty">Qty</label>
                                        <input type="text" name="qty" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="penerima">Penerima</label>
                                        <input type="text" name="penerima" class="form-control">
                                    </div>
                                    <button class="btn btn-primary" type="submit" name="tambah">Simpan</button>
                                </form>
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
