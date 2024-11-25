<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit;
}


require_once "../config.php";
$tittle = "Data Mahasiswa";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Dosen</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Data Dosen</li>
                        </ol>

                        <div class="card">
  <div class="card-header">
    <span class="h5 my-2"><i class="fa-solid fa-list"></i> Data Dosen</span>
    <a href="<?= $main_url ?>dosen/add-dosen.php" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-plus"></i> Tambah Dosen</a>
  </div>
  <div class="card-body">
  <table class="table table-hover" id="datatablesSimple">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col"> <center>FOTO</center></th>
      <th scope="col"><center>NIDs</center></th>
      <th scope="col"><center>NAMA</center></th>
      <th scope="col"><center>No.HP</center></th>
      <th scope="col"><center>JABATAN</center></th>
      <th scope="col"><center>PRODI</center></th>
      <th scope="col"><center>ALAMAT</center></th>
      <th scope="col"><center>OPERASI</center></th>
    </tr>
  </thead>
  <tbody>
    <?php
$no = 1;
$queryDosen = mysqli_query($koneksi,"SELECT * FROM tb_dosen");
while ($data = mysqli_fetch_array($queryDosen)) {?>


    <tr>
      <th scope="row"><?=$no++ ?></th>
      <td align="center"><img src="../tools/image/<?= $data['foto'] ?>" class="rounded-circle" width="60px"alt="foto dosen"></td>
      <td align="center"><?= $data['nid']?></td>
      <td align="center"><?= $data['nama']?></td>
      <td align="center"><?= $data['hp']?></td>
      <td align="center"><?= $data['jabatan']?></td>
      <td align="center"><?= $data['prodi']?></td>
      <td align="center"><?= $data['alamat']?></td>
      <td align="center">
        <a href="edit-dosen.php?nid=<?=$data['nid'] ?>" class="btn btn-sm btn-warning" tittle=" Update Dosen"><i class="fa-solid fa-pen"></i></a>
        <a href="hapus-dosen.php?nid=<?= $data['nid']?>&foto=<?= $data['foto']?>" class="btn btn-sm btn-danger" tittle="Hapus dosen" onclick="return confirm('Apakah Anda Yakin ingin menghapus data ini ?')"><i class="fa-solid fa-trash"></i> </a>
      </td>
    </tr>
    <?php
}


?>
  </tbody>
</table>
                    </div>
                </main>
<?php

require_once "../template/footer.php";



?>