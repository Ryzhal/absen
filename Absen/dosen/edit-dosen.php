<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit;
}


require_once  "../config.php";


$tittle = "Update - Dosen";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


$nid = $_GET['nid'];

$dosen = mysqli_query($koneksi,"SELECT * FROM tb_dosen WHERE nid ='$nid'");
$data = mysqli_fetch_array($dosen);


?>

<div id="layoutSidenav_content">
<main>
 <div class="container-fluid px-4">
    <h1 class="mt-4">Update Dosen</h1>
        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item "><a href="../dosen/dosen.php">Data Dosen</a></li>
                            <li class="breadcrumb-item active">Update Dosen</li>
        </ol>
<form action="proses-dosen.php" method="POST" enctype="multipart/form-data">

<div class="card">
  <div class="card-header">
  <span class="h5 my-2"><i class="fa-regular fa-square-plus"></i> Update Dosen</span>
    <button type="submit" name="update" class=" btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Update</button>
    
  </div>
  <div class="card-body">
  <div class="row">
    <div class="col-8">
        
    <div class="mb-3 row">
    <label for="nid" class="col-sm-2 col-form-label">NIDs</label>
    <div class="col-sm-9" style="margin-left: -50px;">
      <input type="text" name="nid"  class="form-control"  id="nid" value="<?=$data['nid']?>" required>
    </div>
  </div>

    <div class="mb-3 row">
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-9" style="margin-left: -50px;">
      <input type="text" name="nama"  class="form-control"  id="nama" value="<?= $data['nama'] ?>" required>
    </div>
  </div>

    <div class="mb-3 row">
    <label for="hp" class="col-sm-2 col-form-label">No.Hp</label>
    <div class="col-sm-9" style="margin-left: -50px;">
      <input type="text" name="hp"  class="form-control"  id="hp" value="<?= $data['hp'] ?>" required>
    </div>
  </div>

  

  <div class="mb-3 row">
        <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
        <div class="col-sm-9" style="margin-left: -50px;">
        <select name="jabatan" id="jabatan" class="form-select " required>
          <?php
          $jabatan = ["Rektor","Wakil Rektor","Ketua Prodi","Dosen Pembimbing","Dosen Pengajar"];
          foreach($jabatan as $jbt){
            if($data['jabatan']==$jbt){?>
            <option value="<?=$jbt;?>"selected><?=$jbt;?></option><?php }else{?>
            <option value="<?=$jbt;?>"><?=$jbt;?></option>
            
            
            
            <?php
            }
          }
          ?>
        </select> 
        </div>
      </div>

      <div class="mb-3 row">
        <label for="prodi" class="col-sm-2 col-form-label"> Prodi</label>
        <div class="col-sm-9" style="margin-left: -50px;">
        <select name="prodi" id="prodi" class="form-select " required>
        <?php
          $prodi = ["Teknik Informatika","Sistem Informasi","Teknik Sipil","Manajemen","Akutansi","PGSD"];
          foreach($prodi as $prd){
            if($data['jurusan']==$prd){?>
            <option value="<?= $prd; ?>" selected><?= $prd; ?></option>
            <?php }else{?>
                <option value="<?= $prd; ?>"><?= $prd; ?></option>
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
        <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" placeholder= " Alamat" required><?= $data['alamat'] ?></textarea>
        </div>
      </div>

    </div>
    <div class="col-4 text-center px-5">
    <input type="hidden" name="fotoLama" value="<?= $data['foto']?>">
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