<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_tamu WHERE id = '$id'");
    $data = mysqli_fetch_array($query);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Pengunjung</title>
    <!-- Menghubungkan Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1e1e2f, #121212);
            min-height: 100vh;
        }
        .container {
            background-color: #1e1e2f;
            padding: 20px;
            border-radius: 10px;
        }
        .card {
            background-color: #25274d;
        }
        .btn-secondary {
            background-color: #6c757d !important;
            color: #fff !important;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3>Detail Pengunjung</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped table-dark">
                <tr>
                    <th>Tanggal</th>
                    <td><?= $data['tanggal'] ?></td>
                </tr>
                <tr>
                    <th>Nama Pengunjung</th>
                    <td><?= $data['nama'] ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?= $data['alamat'] ?></td>
                </tr>
                <tr>
                    <th>Keperluan</th>
                    <td><?= $data['keperluan'] ?></td>
                </tr>
                <tr>
                    <th>Instansi</th>
                    <td><?= $data['instansi'] ?></td>
                </tr>
                <tr>
                    <th>No. HP</th>
                    <td><?= $data['nohp'] ?></td>
                </tr>
            </table>
            <a href="rekapitulasi.php" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
</div>

<!-- Menghubungkan Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
