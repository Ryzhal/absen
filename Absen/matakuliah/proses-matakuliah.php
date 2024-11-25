<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit;
}


require_once  "../config.php";


if (isset($_POST['simpan'])) {
    $matakuliah = htmlspecialchars($_POST['matakuliah']);
    $prodi = $_POST['prodi'];
    $dosen = $_POST['dosen'];
    

    // cek matakuliah
    $cekMatakuliah   = mysqli_query($koneksi,"SELECT * FROM tb_matakuliah where matakuliah = '$matakuliah'");
    if (mysqli_num_rows($cekMatakuliah) > 0) {
        header("location:matakuliah.php?msg=cancel");
        return;
    }

    // melakukan proses ke database
    mysqli_query($koneksi,"INSERT INTO tb_matakuliah VALUES (nuLL,'$matakuliah','$prodi','$dosen')");
    header("location:matakuliah.php?msg=added");
    return;

}
    ?>