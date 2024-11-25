<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit;
}


require_once  "../config.php";


if (isset($_POST['simpan'])) {
    $nim = $_POST['nim'];
    $nama = htmlspecialchars($_POST['nama']);
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $alamat = htmlspecialchars($_POST['alamat']);
    $foto  = htmlspecialchars($_FILES['image']['name']);


// //      // cek nim
// //  $CekNim   = mysqli_query($koneksi,"SELECT * FROM tb_siswa where nim = '$nim'");
// //  if (mysqli_num_rows($CekNim) > 0) {
// //      header("location:add-siswa.php?msg=cancel");
// //      return;
//  }
 
// upload foto
if($foto != null){
    $url = 'add-siswa.php';
    $foto = uploadimg($url);
} else{
    $foto = 'upload.jpg';
}

 mysqli_query($koneksi,"INSERT INTO tb_siswa VALUES ('$nim','$nama','$alamat','$kelas','$jurusan','$foto')");
 
 echo "<script>
        alert(' Data Siswa Berhasil disimpan..');
        document.location.href = 'add-siswa.php '; 
        </script>";
  return;
} else if (isset($_POST['update'])){
    $nim = $_POST['nim'];
    $nama = htmlspecialchars($_POST['nama']);
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $alamat = htmlspecialchars($_POST['alamat']);
    $foto  = htmlspecialchars($_POST['fotoLama']);

    if ($_FILES['image']['error']=== 4) {
        $fotoSiswa = $foto;
    }else{
        $url = "siswa.php";
        $fotoSiswa = uploadimg($url);
        if($foto != 'upload.jpg'){
            @unlink('../tools/image/'. $foto );
        }
    }

    mysqli_query($koneksi,"UPDATE  tb_siswa  SET 
                            nama = '$nama',
                            alamat = '$alamat',
                            kelas = '$kelas',
                            jurusan = '$jurusan',
                            foto = '$fotoSiswa'
                            WHERE NIM = '$nim'
                            ");
 
 echo "<script>
        alert(' Data Siswa Berhasil diupdate..');
        document.location.href = 'siswa.php '; 
        </script>";
  return;
}



?>