<?php
    require_once ('../config/koneksi.php');
    require_once ('dbase.php');

    include '../models/m_news.php';

    $koneksi = new database($host, $user, $pass, $dbase);

    $news = new news($koneksi);

    $idnews = $_POST['id_news'];
    $judul = $koneksi->conn->real_escape_string($_POST['judul']);
    $tanggal = $koneksi->conn->real_escape_string($_POST['tanggal']);
    // $gambar = $koneksi->conn->real_escape_string($_POST['gambar']);

    $pict = $_FILES['foto']['name'];

    $extensi = explode(".",$_FILES['foto']['name']);
    $namabaru = $judul.".".end($extensi);
    $sumber = $_FILES['foto']['tmp_name'];

    if( $pict == ''){
        $news->ubah("Update berita SET judul='$judul', tanggal='$tanggal' Where id='$idnews'");        
        echo "<script> window.location='?page=news';</script>";
    }else{
        $foto_awal = $news->tampilBerita($idnews)->fetch_object()->gambar;
        unlink('../img/news/'.$foto_awal);
        $upload = move_uploaded_file($sumber, '../img/news/'.$namabaru);
        if($upload){
            $news->ubah("Update berita SET judul='$judul', tanggal='$tanggal', gambar='$namabaru' Where id='$idnews'");        
            echo "<script> window.location='?page=news';</script>";
        }else{
            echo "<script>alert('Upload Gagal Broo..!')</script>";
        }
    }   
?>