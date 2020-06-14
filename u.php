<?php
include "f.php";
$id = $_GET['id'];
$o = query("SELECT * FROM orang WHERE id = $id")[0];
if (isset($_POST['ubah'])) {
    if (ubah($_POST) > 0) {
        $_SESSION['ubah'] = true;
        header("location:index.php");
    } else {
        $errorUbah = true;
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
    <title>Ubah</title>
</head>

<body>
    <!-- alert -->
    <?php if (isset($errorUbah)) : ?>
        <div class="error-ubah" data-errorubah="error"></div>
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

    <!-- FORMS -->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <!-- alert -->
                    <?php if (isset($_SESSION['bukangambarubah'])) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Yang anda Upload bukan Gambar!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php unset($_SESSION['bukangambarubah']);
                    endif ?>

                    <input type="hidden" name="id" id="id" value="<?= $o['id'] ?>">
                    <input type="hidden" name="gambarLama" id="gambarLama" value="<?= $o['gambar'] ?>">
                    <div class="form-group">
                        <label for="nrp">NRP</label>
                        <input type="number" class="form-control" id="nrp" name="nrp" value="<?= $o['nrp'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $o['nama'] ?>">
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img src="img/<?= $o['gambar'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"><?= $o['gambar'] ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Upload Gambar</label>
                        <input type="file" class="form-control-file" id="gambar" name="gambar">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="ubah" class="btn btn-primary text-white">Ubah</button>
                    </div>
                </form>
                </>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/sweetalert2.all.min.js"></script>
        <script src="js/flash.js"></script>
</body>

</html>