<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit;
}


require_once  "../config.php";


if (isset($_POST['simpan'])) {
    $nid = $_POST['nid'];
    $nama = htmlspecialchars($_POST['nama']);
    $noHp = htmlspecialchars($_POST['hp']);
    $jabatan = $_POST['jabatan'];
    $prodi = $_POST['prodi'];
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
    $url = 'add-dosen.php';
    $foto = uploadimg($url);
} else{
    $foto = 'upload.jpg';
}

 mysqli_query($koneksi,"INSERT INTO tb_dosen VALUES ('$nid','$nama','$noHp','$jabatan','$prodi','$alamat','$foto')");
 
 echo "<script>
        alert(' Data Dosen Berhasil disimpan..');
        document.location.href = 'add-dosen.php '; 
        </script>";
  return;
} else if (isset($_POST['update'])){
    $nid = $_POST['nid'];
    $nama = htmlspecialchars($_POST['nama']);
    $noHp = htmlspecialchars($_POST['hp']);
    $jabatan = $_POST['jabatan'];
    $prodi = $_POST['prodi'];
    $alamat = htmlspecialchars($_POST['alamat']);
    $foto  = htmlspecialchars($_POST['fotoLama']);

    if ($_FILES['image']['error']=== 4) {
        $fotoDosen = $foto;
    }else{
        $url = "dosen.php";
        $fotoDosen = uploadimg($url);
        if($foto != 'upload.jpg'){
            @unlink('../tools/image/'. $foto );
        }
    }

    mysqli_query($koneksi,"UPDATE  tb_dosen  SET 
                            nama = '$nama',
                            hp = '$noHp',
                            jabatan = '$jabatan',
                            prodi = '$prodi',
                            alamat = '$alamat',
                            foto = '$fotoDosen'
                            WHERE NID = '$nid'
                            ");
 
 echo "<script>
        alert(' Data Dosen Berhasil diupdate..');
        document.location.href = 'dosen.php '; 
        </script>";
  return;
}



?>