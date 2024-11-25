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
                        <h1 class="mt-4">Data Mahasiswa</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item "><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item active">Data Mahasiswa</li>
                        </ol>

                        <div class="card">
  <div class="card-header">
    <span class="h5 my-2"><i class="fa-solid fa-list"></i> Data Mahasiswa</span>
    <a href="<?= $main_url ?>siswa/add-siswa.php" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-plus"></i> Tambah Siswa</a>
  </div>
  <div class="card-body">
  <table class="table table-hover" id="datatablesSimple">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col"> <center>FOTO</center></th>
      <th scope="col"><center>NIM</center></th>
      <th scope="col"><center>NAMA</center></th>
      <th scope="col"><center>KELAS</center></th>
      <th scope="col"><center>JURUSAN</center></th>
      <th scope="col"><center>ALAMAT</center></th>
      <th scope="col"><center>FORMAT</center></th>
    </tr>
    
  </thead>
  <tbody>
    <?php
$no = 1;
$querySiswa = mysqli_query($koneksi,"SELECT * FROM tb_siswa");
while ($data = mysqli_fetch_array($querySiswa)) {?>


    <tr>
      <th scope="row"><?=$no++ ?></th>
      <td align="center"><img src="../tools/image/<?= $data['foto'] ?>" class="rounded-circle mx-auto d-block" width="60px"alt="foto Siswa"></td>
      <td align="center"><?= $data['nim']?></td>
      <td align="center"><?= $data['nama']?></td>
      <td align="center"><?= $data['kelas']?></td>
      <td align="center"><?= $data['jurusan']?></td>
      <td align="center"><?= $data['alamat']?></td>
      <td align="center"  >
        <a href="edit-siswa.php?nim=<?=$data['nim'] ?>" class="btn btn-sm btn-warning " tittle=" Update Siswa"><i class="fa-solid fa-pen"></i></a>
        <a href="hapus-siswa.php?nim=<?= $data['nim']?>&foto=<?= $data['foto']?>" class="btn btn-sm btn-danger " tittle="Hapus Siswa" onclick="return confirm('Apakah Anda Yakin ingin menghapus data ini ?')"><i class="fa-solid fa-trash"></i> </a>
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