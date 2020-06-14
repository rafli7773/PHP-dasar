<?php
include "f.php";
if (isset($_POST['tambah'])) {
    if (tambah($_POST) > 0) {
        $_SESSION['tambah'] = true;
        header("location:index.php");
    } else {
        $errorTambah = true;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/sweetalert2.css">
    <title>Tambah</title>
</head>

<body>
    <!-- flashdata error -->
    <?php if (isset($errorTambah)) : ?>
        <div class="tambah-error" data-errortambah="woi"></div>
    <?php endif ?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2">
        <div class="container">
            <a class="navbar-brand btn btn-primary text-white" href="index.php">Index</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- forms -->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- alert -->
                <?php if (isset($_SESSION['gkadagambar'])) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Upload Gambar Terlebih Dahulu
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php unset($_SESSION['gkadagambar']);
                endif ?>
                <?php if (isset($_SESSION['bukangambar'])) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Yang anda upload bukan gambar!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php unset($_SESSION['bukangambar']);
                endif ?>
                <?php if (isset($_SESSION['kebesaran'])) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Size gambar terlalu besar
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php unset($_SESSION['kebesaran']);
                endif ?>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nrp">NRP</label>
                        <input type="number" class="form-control" id="nrp" name="nrp" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Upload Gambar</label>
                        <input type="file" class="form-control-file" id="gambar" name="gambar">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="tambah" class="btn btn-primary text-white">Tambah</button>
                    </div>
            </div>
        </div>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/sweetalert2.min.js"></script>
    <script src="js/flash.js"></script>

</body>

</html>