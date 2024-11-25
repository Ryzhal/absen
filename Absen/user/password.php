<?php


session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit;
}


require_once  "../config.php";

$tittle = "Ganti-Password" ;
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

if (isset($_GET['msg'])) {
  $msg= $_GET['msg'];
}else{
  $msg= '';
}

$alert='';

if($msg == 'updated'){
  $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <i class="fa-solid fa-circle-check"></i> Password Berhasil di ganti.. !!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if($msg == 'err1'){
  $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <i class="fa-solid fa-xmark"></i> Ganti Password Gagal,Konfirmasi password tidak sama.. !!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if($msg == 'err2'){
  $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <i class="fa-solid fa-xmark"></i> Ganti Password Gagal, password lama anda salah.. !!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Ganti Password</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Ganti Password</li>
                        </ol>
                        <form action="proses-pass.php" method="POST">
                          <?php
                          if ($msg !== '') {
                            echo $alert;
                          }


?>
                        <div class="card">
  <div class="card-header">
  <span class="h5 my-2"><i class="fa-regular fa-pen-to-square"></i> Ganti Password</span>
    <button type="submit" name="simpan" class=" btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
    <button type="reset" name="reset" class=" btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
  </div>
  <div class="card-body">
  <div class="col-5">
  <label for="curPass" class="form-label">Password Lama</label>
  <input type="password" class="form-control"  name="curPass"id="curPass" placeholder="Masukan Password Saat Ini" required>
</div>
  <div class="col-5 py-1">
  <label for="newPass" class="form-label">Password Baru</label>
  <input type="password" class="form-control" minlength="4" maxlength="20" name="newPass"id="newPass" placeholder="Masukan Password Baru" required>
</div>
  <div class="col-5 py-1">
  <label for="confPass" class="form-label">Konfirmasi Password Baru</label>
  <input type="password" class="form-control" minlength="4" maxlength="20" name="confPass"id="confPass" placeholder="Masukan Ulang Password Baru" required>
</div>
  </div>
</div>
</form>
</div>
</main>

<?php

require_once "../template/footer.php";

?>