<?php

    require 'koneksi.php';

    session_start();
    if (!isset($_SESSION['username_user'])){
        header("Location: index.php");
    }

    $id_bengkel = $_GET['id_bengkel'];

    $result = mysqli_query($conn, "DELETE FROM bengkel WHERE id_bengkel='$id_bengkel'");

    header("location: view_bengkel_admin.php?delete=success");

?>