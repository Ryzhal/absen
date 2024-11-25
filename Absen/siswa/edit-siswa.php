<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit;
}


require_once  "../config.php";


$tittle = "Update Siswa";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$nim = $_GET['nim'];

$siswa = mysqli_query($koneksi,"SELECT * FROM tb_siswa WHERE nim = '$nim'");
$data = mysqli_fetch_array($siswa);

?>

<div id="layoutSidenav_content">
<main>
 <div class="container-fluid px-4">
    <h1 class="mt-4">Update Mahasiswa</h1>
        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item "><a href="../siswa/siswa.php">Data Mahasiswa</a></li>
                            <li class="breadcrumb-item active">Update Mahasiswa</li>
        </ol>
<form action="proses-siswa.php" method="POST" enctype="multipart/form-data">

<div class="card">
  <div class="card-header">
  <span class="h5 my-2"><i class="fa-regular fa-pen-to-square"></i> Update siswa</span>
    <button type="submit" name="update" class=" btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Update</button>
  </div>
  <div class="card-body">
  <div class="row">
    <div class="col-8">
        
    <div class="mb-3 row">
    <label for="nim" class="col-sm-2 col-form-label">Nim</label>
    <div class="col-sm-9" style="margin-left: -50px;">
      <input type="text" name="nim"  class="form-control"  id="nim" value="<?= $nim ?>" required>
    </div>
  </div>

    <div class="mb-3 row">
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-9" style="margin-left: -50px;">
      <input type="text" name="nama"  class="form-control"  id="nama" value="<?= $data['nama'] ?>"required>
    </div>
  </div>

  

  <div class="mb-3 row">
        <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
        <div class="col-sm-9" style="margin-left: -50px;">
        <select name="kelas" id="kelas" class="form-select "   required>
          <?php
          $kelas = ["Kelas A","Kelas B","Kelas C"];
          foreach($kelas as $kls){
            if($data['kelas']==$kls){?>
            <option value="<?= $kls; ?>" selected><?= $kls; ?></option>
            <?php }else{?>
                <option value="<?= $kls; ?>"><?= $kls; ?></option>
<?php

            }
          }
          ?>
        </select> 
        </div>
      </div>

      <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label"> Jurusan</label>
        <div class="col-sm-9" style="margin-left: -50px;">
        <select name="jurusan" id="jurusan" class="form-select " value="<?= $jurusan ?>" required>
        <?php
          $jurusan = ["Teknik Informatika","Sistem Informasi","Teknik Sipil","Manajemen","Akutansi","PGSD"];
          foreach($jurusan as $jrs){
            if($data['jurusan']==$jrs){?>
            <option value="<?= $jrs; ?>" selected><?= $jrs; ?></option>
            <?php }else{?>
                <option value="<?= $jrs; ?>"><?= $jrs; ?></option>
<?php

            }
          }
          ?>
        </select> 
        </div>
      </div>

      <div class="mb-3 row">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-9" style="margin-left: -50px;">
        <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" placeholder= " Alamat" required> <?= $data['alamat'] ?></textarea>
        </div>
      </div>

    </div>
    <div class="col-4 text-center px-5">
        <input type="hidden" name="fotoLama" value="<?= $data['foto']?>">
          <img src="../tools/image/<?= $data['foto']?>" alt="" class="mb-3 rounded-circle" width="40%">
          <input type="file" name="image" value="<?= $foto ?>" class="form-control form-control-sm ">
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