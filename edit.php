<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "koneksi.php";

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan";
    exit;
}

$id = (int) $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM tbl_tamu WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data tidak ditemukan";
    exit;
}

if (isset($_POST['update'])) {
    $nama      = $_POST['nama'];
    $alamat    = $_POST['alamat'];
    $keperluan = $_POST['keperluan'];
    $instansi  = $_POST['instansi'];
    $nohp      = $_POST['nohp'];

    $update = mysqli_query($koneksi, "
        UPDATE tbl_tamu SET
            nama='$nama',
            alamat='$alamat',
            keperluan='$keperluan',
            instansi='$instansi',
            nohp='$nohp'
        WHERE id='$id'
    ");

    if ($update) {
        header("Location: rekapitulasi.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Pengunjung</title>

    <!-- ✅ Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional: FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: #0f172a;
        }
        .card {
            border-radius: 15px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h5><i class="fa fa-edit"></i> Edit Data Pengunjung</h5>
                </div>
                <div class="card-body">

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?= $data['nama']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="<?= $data['alamat']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Keperluan</label>
                            <input type="text" name="keperluan" class="form-control" value="<?= $data['keperluan']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Instansi</label>
                            <input type="text" name="instansi" class="form-control" value="<?= $data['instansi']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">No HP</label>
                            <input type="text" name="nohp" class="form-control" value="<?= $data['nohp']; ?>" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" name="update" class="btn btn-success">
                                <i class="fa fa-save"></i> Update
                            </button>
                            <a href="rekapitulasi.php" class="btn btn-danger">
                                <i class="fa fa-arrow-left"></i> Kembali
                            </a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
