<?php

    require 'koneksi.php';

    if(isset($_POST['submit'])){

        // mengambil isian dari form login
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($conn,"SELECT * FROM akun WHERE username_akun = '$username' AND password_akun = '$password'");
        $test = mysqli_num_rows($query);
        $pgw = mysqli_fetch_assoc($query);

        if ($test > 0) {
                switch ($pgw['id_akses']) {
                    case 1:
                        session_start();
                        $_SESSION['username_akun'] = $username;
                        echo "
                            <script> 
                                alert ('Login Berhasil Admin');
                                document.location.href = 'dashboard_admin.php';
                            </script>";
                    break;
                }
        }else{
                        echo "<script> 
                            alert ('Login Gagal');
                        document.location.href = 'index.php';
                    </script>";
            }
    }
?>