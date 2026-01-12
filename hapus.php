<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = mysqli_query($koneksi, "DELETE FROM tbl_tamu WHERE id = '$id'");
    
    if ($delete) {
        header("Location: rekapitulasi.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
