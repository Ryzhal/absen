<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit;
}


require_once  "../config.php";

$id     = $_GET['nid'];
$foto   = $_GET['foto'];

mysqli_query($koneksi,"DELETE FROM tb_dosen WHERE nid = '$id'");
if ($foto != 'upload.jpg') {
    unlink('../tools/image/'. $foto);
}

echo"<script>
        alert(' Data Dosen berhasil di hapus ..');
        document.location.href = 'dosen.php';
</script>";
return ;
?>