<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit;
}


require_once  "../config.php";


$tittle = "Tambah - Dosen";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

// $queryNim = mysqli_query($koneksi,"SELECT max(nim) as maxNim FROM tb_siswa");
// $data = mysqli_fetch_array($queryNim);
// $maxNim = $data["maxNim"];

// $noUrut = (int) substr($maxNim,3,3);
// $noUrut++;
// $maxNim = "02204".sprintf('%03',$noUrut);

?>

<div id="layoutSidenav_content">
<main>
 <div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Dosen</h1>
        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item "><a href="../dosen/dosen.php">Data Dosen</a></li>
                            <li class="breadcrumb-item active">Tambah Dosen</li>
        </ol>
<form action="proses-dosen.php" method="POST" enctype="multipart/form-data">

<div class="card">
  <div class="card-header">
  <span class="h5 my-2"><i class="fa-regular fa-square-plus"></i> Tambah Dosen</span>
    <button type="submit" name="simpan" class=" btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
    <button type="reset" name="reset" class=" btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
  </div>
  <div class="card-body">
  <div class="row">
    <div class="col-8">
        
    <div class="mb-3 row">
    <label for="nid" class="col-sm-2 col-form-label">NIDs</label>
    <div class="col-sm-9" style="margin-left: -50px;">
      <input type="text" name="nid"  class="form-control"  id="nid" value="" required>
    </div>
  </div>

    <div class="mb-3 row">
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-9" style="margin-left: -50px;">
      <input type="text" name="nama"  class="form-control"  id="nama" required>
    </div>
  </div>

    <div class="mb-3 row">
    <label for="hp" class="col-sm-2 col-form-label">No.Hp</label>
    <div class="col-sm-9" style="margin-left: -50px;">
      <input type="text" name="hp"  class="form-control"  id="hp" required>
    </div>
  </div>

  

  <div class="mb-3 row">
        <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
        <div class="col-sm-9" style="margin-left: -50px;">
        <select name="jabatan" id="jabatan" class="form-select " required>
          <option  selected>--Pilih Jabatan-- </option>
          <option value="Rektor" > Rektor </option>
          <option value="Wakil Rektor" > Wakil Rektor </option>
          <option value="Ketua Prodi" > Ketua Prodi </option>
          <option value="Dosen Pembimbing" > Dosen Pembimbing </option>
          <option value="Dosen Pengajar" > Dosen Pengajar </option>
        </select> 
        </div>
      </div>

      <div class="mb-3 row">
        <label for="prodi" class="col-sm-2 col-form-label"> Prodi</label>
        <div class="col-sm-9" style="margin-left: -50px;">
        <select name="prodi" id="prodi" class="form-select " required>
          <option selected>--Pilih Program Studi-- </option>
          <option value="Teknik Informatika" > Teknik Informatika </option>
          <option value="Sistem Informasi" > Sistem Informasi </option>
          <option value="Teknik Sipil" > Teknik Sipil </option>
          <option value="Manajemen" > Manajemen </option>
          <option value="Akutansi" > Akutansi </option>
          <option value="PGSD" > PGSD </option>
        </select> 
        </div>
      </div>

      <div class="mb-3 row">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-9" style="margin-left: -50px;">
        <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" placeholder= " Alamat" required></textarea>
        </div>
      </div>

    </div>
    <div class="col-4 text-center px-5">
          <img src="../tools/image/upload.jpg" alt="" class="mb-3" width="40%">
          <input type="file" name="image" class="form-control form-control-sm">
          <small class="text-secondary">Pilih Foto PNG,PJG atau JPEG dengan ukuran maximal 1 MB</small>
          <div><small class="text-secondary">Lebar dan Tinggi Harus Sama</small></div>
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