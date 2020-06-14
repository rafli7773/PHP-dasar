<?php session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wai</title>
</head>

<body>

    <br>
    <form action="link.php" method="post">
        <button type="submit" name="satu">satu</button>
        <button type="submit" name="dua">dua</button>
        <button type="submit" name="tiga">tiga</button>
    </form>
    <?php if (isset($_SESSION['satu'])) : ?>
        <div class="flash-satu" data-satu="Woi">satu</div>
    <?php unset($_SESSION['satu']);
    endif ?>

    <?php if (isset($_SESSION['dua'])) : ?>
        <div class="flash-dua" data-dua="Halah">dua</div>
    <?php unset($_SESSION['dua']);
    endif ?>

    <?php ?>
    <?php ?>

</body>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/sweetalert2.all.min.js"></script>
<script src="script.js"></script>

</html>