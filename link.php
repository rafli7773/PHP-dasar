<?php
session_start();
if (isset($_POST['satu'])) {
    $_SESSION['satu'] = true;
    header("location:d.php");
} else if (isset($_POST['dua'])) {
    $_SESSION['dua'] = true;
    header("location:d.php");
}
