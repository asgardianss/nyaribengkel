<?php

	session_start();
    if (!isset($_SESSION['username_akun'])){
        header("Location: index.php");
    }

    require 'koneksi.php';

        if (isset($_POST['submit'])) {
            $id_bengkel = $_GET['id_bengkel'];
            $nama = $_POST['nama'];
            $kategori = $_POST['kategori'];
            $jambuka = $_POST['jambuka'];
            $jamtutup = $_POST['jamtutup'];
            $kecamatan = $_POST['kecamatan'];
            $latitude = $_POST['latitude'];
            $longitude = $_POST['longitude'];
            $username = $_SESSION['username_akun'];

            $result= mysqli_query($conn, "SELECT id_akun FROM akun WHERE username_akun='$username'");
            $data = mysqli_fetch_array($result);
            $user = $data['id_akun'];

            $simpanData = mysqli_query($conn, "UPDATE bengkel SET nama_bengkel='$nama',kategori_bengkel='$kategori',jam_buka='$jambuka',jam_tutup='$jamtutup',id_kecamatan='$kecamatan',latitude='$latitude',longitude='$longitude',id_akun='$user' WHERE id_bengkel='$id_bengkel'");

            header("location: view_bengkel_admin.php?update=success");
        }

 ?>