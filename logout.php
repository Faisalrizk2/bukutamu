<?php

//session start
session_start();

//session yang dihilangkan
unset($_SESSION['id_user']);
unset($_SESSION['password']);
unset($_SESSION['nama_pengguna']);
unset($_SESSION['username']);

session_destroy();
echo"<script>alert('Anda telah Logout dari Halaman Admin');
    document.location='index.php'</script>";

?>