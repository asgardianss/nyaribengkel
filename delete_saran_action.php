<?php

    require 'koneksi.php';

    session_start();
    if (!isset($_SESSION['username_user'])){
        header("Location: index.php");
    }

    $id_saran = $_GET['id_saran'];

    $result = mysqli_query($conn, "DELETE FROM saran WHERE id_saran='$id_saran'");

    header("location: view_saran_admin.php?delete=success");

?>