<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit;
}


require_once  "../config.php";

$id = $_GET['id'];

mysqli_query($koneksi,"DELETE FROM `tb_matakuliah` WHERE id = $id");

header("location: matakuliah.php?msg=delete");

?>