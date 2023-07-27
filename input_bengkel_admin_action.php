<?php
    
    require 'koneksi.php';
    if (isset($_POST['submit'])) {

        $nama = $_POST['nama'];
        $kategori = $_POST['kategori'];
        $jambuka = $_POST['jambuka'];
        $jamtutup = $_POST['jamtutup'];
        $kecamatan = $_POST['kecamatan'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $akses = 1;

        $simpanData = mysqli_query($conn, "INSERT INTO bengkel VALUES ('','$nama','$kategori','$jambuka','$jamtutup','$kecamatan','$latitude','$longitude','$akses')");
        header("location: input_bengkel_admin.php?input=success");
    }

?>