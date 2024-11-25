<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit;
}


require_once "../config.php";

$tittle = "Profil Kampus";

require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


$kampus = mysqli_query($koneksi, "SELECT * FROM tb_kampus where id = 1");
$data = mysqli_fetch_array($kampus);


?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Profile-Universitas</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Profile-Universitas</li>
                        </ol>
                        <form action="profile-kampus.php" method="POST" enctype="multipart/form-data">

                        <div class="card">
                            <div class="card-header">
                                <span class="h5"><i class="fa-solid fa-pen-to-square"></i> Data Universitas</span>
                                <button type="submit" name="simpan" class=" btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
    <button type="reset" name="reset" class=" btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Delete</button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4 text-center px-5">
                                    <img src="../tools/image/upload.jpg" alt="Gambar User" class="mb-3 " width="100%">
                                    <input type="file" name="image" class="form-control form-control-sm">
                                    <small class="text-secondary">Pilih Foto PNG,PJG atau JPEG dengan ukuran maximal 1 MB</small>
                                    </div>
                                    <div class="col-8">
                                    <div class="mb-3 row">
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control" id="nama" name="nama" placeholder="Nama" required>
    </div>
  </div>
      <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
        <input type="email"  class="form-control" id="email" name="email" placeholder="Email" required>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="status" class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-10">
        <select name="status" id="status" class="form-select border-0 border-bottom" required>
          <option value="" selected>--Pilih Status-- </option>
          <option value="negeri" > Negeri </option>
          <option value="swasta" > Swasta </option>
        </select> 
        </div>
      </div>
      <div class="mb-3 row">
        <label for="akreditasi" class="col-sm-2 col-form-label">akreditasi</label>
        <div class="col-sm-10">
        <select name="akreditasi" id="akreditasi" class="form-select border-0 border-bottom" required>
          <option value="A" selected>A</option>
          <option value="B" > B </option>
          <option value="C" > C </option>
          <option value="D" > D </option>
        </select> 
        </div>
      </div>
      <div class="mb-3 row">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
        <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" placeholder= " Alamat" required></textarea>
        </div>
                                    </div>
      <div class="mb-3 row">
        <label for="visimisi" class="col-sm-2 col-form-label">Visi Misi</label>
        <div class="col-sm-10">
        <textarea name="visimisi" id="visimisi" cols="30" rows="3" class="form-control" placeholder= "visimisi" required></textarea>
        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
</div>
</main>
<?php


require_once "../template/footer.php";

?>
