<?php

// buat koneksi
$koneksi = mysqli_connect("localhost","root","","db_absen");

// Cek Koneksi
// if(mysqli_connect_errno()){
//     echo " KONEKSI GAGAl";
// }
// else{
//     echo "Koneksi BERHASIL-";
// }




//url utama
$main_url = "http://localhost/absen/";

function uploadimg($url)
{
    $namafile = $_FILES['image']['name'];
    $ukuran   = $_FILES['image']['size'];
    $error   = $_FILES['image']['error'];
    $tmp      = $_FILES['image']['tmp_name'];

    // cek yg di upload
    $validExtension = ['jpg','jpeg','png'];
    $fileExtension  = explode('.',$namafile);
    $fileExtension  = strtolower(end($fileExtension));
    if (!in_array($fileExtension,$validExtension)) {
        header("location:". $url .'?msg=notimage');
        die;
    }

    // cek ukuran gambar
    if ($ukuran > 1000000){
        header("location:". $url .'?msg=oversizes');
        die;
    }

    // generate nama file gambar
    $namafilebaru = rand(10,1000) .'-' . $namafile;

    // upload gambar
    move_uploaded_file($tmp,"../tools/image/". $namafilebaru);
    return $namafilebaru;

}
