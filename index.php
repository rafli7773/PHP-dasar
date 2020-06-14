<?php
include "f.php";

$jumlahDataperHalaman = 3;
$jumlahData = count(query("SELECT * FROM orang"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataperHalaman);
$halamanAktif = isset($_GET['halaman']) ? $_GET['halaman'] : 1;
$awalData = ($jumlahDataperHalaman * $halamanAktif - $jumlahDataperHalaman);

$orang = query("SELECT * FROM orang ORDER BY id DESC LIMIT $awalData, $jumlahDataperHalaman");
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
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">


    <title>Index!</title>
</head>

<body>
    <!-- alert -->
    <?php if (isset($_SESSION['tambah'])) : ?>
        <div class="success-tambah" data-successtambah="success"></div>
    <?php unset($_SESSION['tambah']);
    endif; ?>
    <?php if (isset($_SESSION['hapus'])) : ?>
        <div class="success-hapus" data-successhapus="happus"></div>
    <?php unset($_SESSION['hapus']);
    endif; ?>
    <?php if (isset($_SESSION['ubah'])) : ?>
        <div class="success-ubah" data-successubah="successubah"></div>
    <?php unset($_SESSION['ubah']);
    endif ?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2">
        <div class="container">
            <a class="navbar-brand btn btn-primary text-white" href="t.php">Tambah</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- table -->
    <div class="container">
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Aksi</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">NRP</th>
                        <th scope="col">Nama</th>
                    </tr>
                </thead>
                <?php $i = 1 ?>
                <?php foreach ($orang as $o) : ?>
                    <tbody>
                        <tr>
                            <td scope="row"><?= $i ?></td>
                            <td><a href="u.php?id=<?= $o['id'] ?>" class="badge badge-info text-white ml-2">Ubah</a>
                                <a href="h.php?id=<?= $o['id'] ?>" class="badge badge-danger text-white hapus">Hapus</a></td>
                            <td><img src="img/<?= $o['gambar'] ?>" alt="" width="100"></td>
                            <td><?= $o['nrp'] ?></td>
                            <td><?= $o['nama'] ?></td>
                        </tr>
                    </tbody>
                    <?php $i++ ?>
                <?php endforeach ?>

            </table>
        </div>
    </div>

    <!-- pagination -->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <nav aria-label="...">
                    <ul class="pagination text-center">
                        <?php if ($halamanAktif > 1) : ?>
                            <li class="page-item">
                                <a class="page-link" href="?halaman=<?= $halamanAktif - 1 ?>" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                        <?php endif ?>
                        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                            <?php if ($i == $halamanAktif) : ?>
                                <li class="page-item active" aria-current="page">
                                    <a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?> <span class="sr-only">(current)</span></a>
                                </li>
                            <?php else : ?>
                                <li class="page-item"><a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a></li>
                            <?php endif  ?>

                        <?php endfor ?>
                        <?php if ($jumlahHalaman > $halamanAktif) : ?>
                            <li class="page-item">
                                <a class="page-link" href="?halaman=<?= $halamanAktif + 1 ?>">Next</a>
                            </li>
                        <?php endif ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
    <script src="js/flash.js"></script>
    <script src="js/ubah.js"></script>
</body>

</html>