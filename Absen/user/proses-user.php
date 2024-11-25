<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit;
}




require_once "../config.php";

// jika tombol simpan di tekan
if (isset($_POST['simpan'])){
    // ambil value elemen yg di posting
    $username       = trim(htmlspecialchars($_POST['username']));
    $nama           = trim(htmlspecialchars($_POST['nama']));
    $status         = $_POST['status'];
    $alamat         = trim(htmlspecialchars($_POST['alamat']));
    $gambar         = trim(htmlspecialchars($_FILES['image']['name']));
    $password       = 1234;
    $pass           = password_hash($password, PASSWORD_DEFAULT);

    // cek username
    $CekUsername   = mysqli_query($koneksi,"SELECT * FROM tb_user where username = '$username'");
    if (mysqli_num_rows($CekUsername) > 0) {
        header("location:add-user.php?msg=cancel");
        return;
    }


    // upload gambar
    if($gambar != null){
        $url = 'add-user.php';
        $gambar = uploadimg($url);
    } else{
        $gambar = 'upload.jpg';
    }


    mysqli_query($koneksi,"INSERT INTO tb_user VALUES (nuLL,'$username','$pass','$nama','$alamat','$status','$gambar')");
    header("location: add-user.php?msg=added");
    return;

}





?>