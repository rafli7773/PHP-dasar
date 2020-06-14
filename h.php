<?php
include "f.php";
$id = $_GET['id'];
if (hapus($id)) {
    $_SESSION['hapus'] = true;
    header("location:index.php");
}
