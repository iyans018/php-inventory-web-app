<?php 
include "koneksi.php";
session_start();

if (!$_SESSION['username'] && !$_SESSION['login']) {
    header("Location:login.php");
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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

                        <div class="mb-4">
                            <p>Selamat datang, <?= $_SESSION['username'] ?></p>
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
