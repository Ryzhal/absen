<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit;
}


require_once "../config.php";
$tittle = "Matakuliah - Unipol";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
  }else {
    $msg = '';
  }
  
  $alert = '';
  if($msg == 'cancel'){
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-xmark"></i> Tambah Matakuliah gagal, Matakuliah sudah ada ..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  $alert = '';
  if($msg == 'delete'){
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Delete Matakuliah Berhasil, .. !!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }

  if($msg == 'added'){
    $alert = '<div class="alert alert-success alert-dismissible fade show"  id="added"  role="alert">
    <i class="fa-solid fa-circle-check"></i> Tambah Matakuliah Berhasil, .. !!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Matakuliah</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Matakuliah</li>
                        </ol>
                        
                        <!--  PESAN JIKA matakuliah SDH ADA  -->
                        <?php 
                    if ($msg !== '') {
                      echo $alert;
                    }
                    
                    ?>
                    <div class="row">
                            <div class="col-4">
                            <div class="card">
  <div class="card-header">
  <i class="fa-solid fa-plus"></i> Tambah Matakuliah
  </div>
  <div class="card-body">
<form action="proses-matakuliah.php" method="POST">
  <div class="mb-3">
    <label for="matakuliah" class="form-label ps-1" >Matakuliah</label>
    <input type="Text" class="form-control" id="matakuliah" name="matakuliah" placeholder="Nama Matakuliah" required >
  </div>

  <div class="mb-3">
      <label for="prodi" class="form-label ps-1 " >Prodi</label>
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

    <div class="mb-3">
      <label for="dosen" class="form-label ps-1 " >Dosen</label>
        <select name="dosen" id="dosen" class="form-select " required>
          <option selected>--Dosen-- </option>
          <?php 
          $queryDosen = mysqli_query($koneksi, "SELECT * FROM tb_dosen");
          while ($dataDosen = mysqli_fetch_array($queryDosen)) {?>
            <option value="<?= $dataDosen['nama']?>"><?= $dataDosen['nama']?></option>

            <?php
          }
          
          ?>
        </select> 
    </div>
    <button type="submit" name="simpan" class=" btn btn-sm btn-primary "><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
  <button type="reset" name="reset" class=" btn  btn-sm btn-danger  me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
  </div>
</div>
                            </div>
                            <div class="col-8">
                            <div class="card">
  <div class="card-header">
  <i class="fa-solid fa-list"></i> Data Matakuliah
  </div>
  <div class="card-body">
  <table class="table table-hover" id="datatablesSimple">
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
$queryMatakuliah = mysqli_query($koneksi,"SELECT * FROM tb_matakuliah");
while ($data = mysqli_fetch_array($queryMatakuliah)) {?>
    <tr>
      <th scope="row"><?=$no++ ?></th>
      <td ><?= $data['matakuliah']?></td>
      <td ><?= $data['prodi']?></td>
      <td ><?= $data['dosen']?></td>
      <td align="center">
        <a href="edit-matakuliah.php?id=<?= $data['id']?>" class="btn btn-sm btn-warning me-1"  title="update Matakuliah"><i class="fa-solid fa-pen"></i></a>
        <button type="button" data-id="<?= $data['id']?>" id="btnHapus" class="btn btn-sm btn-danger px-1"  title="Hapus Matakuliah"><i class="fa-solid fa-trash"></i></button> 
    </tr>
    <?php
}


?>
  </tbody>
    </table>
  </div>
</div>
                            </div>
                        </div>
                    </form>
                    </div>
                </main>

<!-- TAMPILAN POP up Hapus (MODAL) -->
                <div class="modal" id="mdlHapus" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Konfirmasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Anda yakin Akan Menghapus data ini ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <a href="" id="btnMdlHapus" class="btn btn-primary">Ya</a>
      </div>
    </div>
  </div>
</div>

<script>

$(document).ready(function () {
  $(document).on('click',"#btnHapus",function(){
    $('#mdlHapus').modal('show');
    let id = $(this).data('id');
    $('#btnMdlHapus').attr('href',"hapus-matakuliah.php?id=" + id);
  })


  setTimeout(function () {
    $('#added').fadeOut('show');
  },300)
})

</script>



                <?php

require_once "../template/footer.php";



?>