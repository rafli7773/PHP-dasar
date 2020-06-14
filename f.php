<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "ahah");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($o = mysqli_fetch_assoc($result)) {
        $rows[] = $o;
    }
    return $rows;
}
function tambah($data)
{
    global $conn;
    $nrp = htmlspecialchars($data['nrp']);
    $nama = htmlspecialchars($data['nama']);
    $gambar = upload();
    if (!$gambar) {
        return false;
    }
    $query = "INSERT INTO orang VALUES('', '$gambar', '$nrp', '$nama')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function upload()
{
    $namaGambar = $_FILES['gambar']['name'];
    $ukuranGambar = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        $_SESSION['gkadagambar'] = true;
        return false;
    }
    $eksensiGambarValid = ['jpg', 'jpeg', 'png', 'jfif'];
    $ekstensiGambar = explode('.', $namaGambar);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $eksensiGambarValid)) {
        $_SESSION['bukangambar'] = true;
        return false;
    }
    if ($ukuranGambar < 5000) {
        $_SESSION['kebesaran'] = true;
        return false;
    }

    $gambarAsli = uniqid();
    $gambarAsli .= '.';
    $gambarAsli .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'img/' . $gambarAsli);
    return $gambarAsli;
}
function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM orang WHERE id = $id");
    return mysqli_affected_rows($conn);
}
function ubah($data)
{
    global $conn;
    $id = $data['id'];
    $nrp = htmlspecialchars($data['nrp']);
    $nama = htmlspecialchars($data['nama']);
    $gambarLama = $data['gambarLama'];
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = uploadUbah();
    }
    $query = "UPDATE orang SET gambar = '$gambar', nrp = '$nrp', nama = '$nama' WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function uploadUbah()
{
    $namaGambar = $_FILES['gambar']['name'];
    $ukuranGambar = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        $_SESSION['gkadagambar'] = true;
        return false;
    }
    $eksensiGambarValid = ['jpg', 'jpeg', 'png', 'jfif'];
    $ekstensiGambar = explode('.', $namaGambar);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $eksensiGambarValid)) {
        $_SESSION['bukangambarubah'] = true;
        return false;
    }
    if ($ukuranGambar < 5000) {
        $_SESSION['kebesaranubah'] = true;
        return false;
    }

    $gambarAsli = uniqid();
    $gambarAsli .= '.';
    $gambarAsli .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'img/' . $gambarAsli);
    return $gambarAsli;
}
