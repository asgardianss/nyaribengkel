<?php
    
    require 'koneksi.php';
    if (isset($_POST['submit'])) {

        $nama = $_POST['nama'];
        $keterangan = $_POST['keterangan'];
        $akses = 1;

        $simpanData = mysqli_query($conn, "INSERT INTO saran VALUES ('','$nama','$keterangan','$akses')");
        header("location: input_saran_user.php?input=success");
    }

?>