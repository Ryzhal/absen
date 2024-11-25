<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit;
}


require_once  "../config.php";

$id     = $_GET['nim'];
$foto   = $_GET['foto'];

mysqli_query($koneksi,"DELETE FROM tb_siswa WHERE nim = '$id'");
if ($foto != 'upload.jpg') {
    unlink('../tools/image/'. $foto);
}

echo"<script>
        alert(' Data siswa berhasil di hapus ..');
        document.location.href = 'siswa.php';
</script>";
return ;
?>