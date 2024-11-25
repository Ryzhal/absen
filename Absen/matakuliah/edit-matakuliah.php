<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit;
}


require_once  "../config.php";


$tittle = "Update - Matakuliah";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


$id = $_GET['id'];

$queryMatakuliah = mysqli_query($koneksi,"SELECT * FROM tb_matakuliah WHERE id =$id");
$data = mysqli_fetch_array($queryMatakuliah);


?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Update Matakuliah</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="matakuliah.php">Back</a></li>
                            
                        </ol>

                        <div class="row">
                            <div class="col-4">
                            <div class="card">
                        <div class="card-header">
  <i class="fa-solid fa-pen"></i> Edit Matakuliah
  </div>
  <div class="card-body">
<form action="proses-matakuliah.php" method="POST">
    <input type="number" name="id" id="<?= $data['id']?>" hidden>
  <div class="mb-3">
    <label for="matakuliah" class="form-label ps-1" >Matakuliah</label>
    <input type="Text" class="form-control" id="matakuliah" name="matakuliah" placeholder="Nama Matakuliah" value="<?= $data['matakuliah']?>" required >
  </div>

  <div class="mb-3">
      <label for="prodi" class="form-label ps-1 " >Prodi</label>
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

    <div class="mb-3">
      <label for="dosen" class="form-label ps-1 " >Dosen</label>
        <select name="dosen" id="dosen" class="form-select " required>
        
          <?php 
          $queryDosen = mysqli_query($koneksi, "SELECT * FROM tb_dosen");
          while ($dataDosen = mysqli_fetch_array
          ($queryDosen)) {
            if($data['dosen']==$dataDosen['nama']){
            ?>
            <option value="<?= $dataDosen['nama']?>" selected><?= $dataDosen['nama']?></option>
<?php }else{?>
    <option value="<?= $dataDosen['nama']?>" ><?= $dataDosen['nama']?></option>
            <?php
}
          }
          
          ?>
        </select> 
    </div>
    <button type="submit" name="update" class=" btn btn-sm btn-primary "><i class="fa-solid fa-pen"></i> Update</button>
  <a href="matakuliah.php"  class=" btn  btn-sm btn-danger  me-1"><i class="fa-solid fa-xmark"></i> Cancel</a>
  </div>
</div>

</div>
                            <div class="col-8">
                            <div class="card">
  <div class="card-header">
  <i class="fa-solid fa-list"></i> Data Matakuliah
  </div>
  <div class="card-body">
  <table class="table table-hover" >
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col"> <center>Matakuliah</center></th>
      <th scope="col"><center>Prodi</center></th>
      <th scope="col"><center>Dosen</center></th>
      <th scope="col"><center>Format</center></th>
    </tr>
  </thead>
  <tbody>
  <?php
$no = 1;
?>
    <tr>
      <th scope="row"><?=$no ?></th>
      <td align="center"><?= $data['matakuliah']?></td>
      <td align="center"><?= $data['prodi']?></td>
      <td align="center"><?= $data['dosen']?></td>
      <td align="center">
        <button type="button" class="btn btn-sm btn-warning rounded-0 col-10">Updating..</button> 
    </tr>
   
  </tbody>
    </table>
  </div>
</div>
                            </div>
                        </div>
                    </form>



                    </div>
                </main>