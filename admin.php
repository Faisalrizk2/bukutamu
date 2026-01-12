<?php include "header.php"; ?>
<?php include "koneksi.php"; ?>

<?php
// Simpan data pengunjung
if (isset($_POST['bsimpan'])) {
    $tgl = date('Y-m-d');
    $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
    $alamat = htmlspecialchars($_POST['alamat'], ENT_QUOTES);
    $keperluan = htmlspecialchars($_POST['keperluan'], ENT_QUOTES);
    $instansi = htmlspecialchars($_POST['instansi'], ENT_QUOTES);
    $nohp = htmlspecialchars($_POST['nohp'], ENT_QUOTES);

    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_tamu VALUES ('', '$tgl', '$nama', '$alamat', '$keperluan', '$instansi', '$nohp')");

    if ($simpan) {
        echo "<script>alert('Simpan Data Sukses, Terima Kasih..!');document.location='?'</script>";
    } else {
        echo "<script>alert('Simpan Data Gagal!');document.location='?'</script>";
    }
}

// Statistik Pengunjung
$hari_ini = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM tbl_tamu WHERE DATE(tanggal) = CURDATE()"))['jumlah'];
$kemarin = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM tbl_tamu WHERE DATE(tanggal) = CURDATE() - INTERVAL 1 DAY"))['jumlah'];
$minggu_ini = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM tbl_tamu WHERE WEEK(tanggal) = WEEK(CURDATE()) AND YEAR(tanggal) = YEAR(CURDATE())"))['jumlah'];
$bulan_ini = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM tbl_tamu WHERE MONTH(tanggal) = MONTH(CURDATE()) AND YEAR(tanggal) = YEAR(CURDATE())"))['jumlah'];
$keseluruhan = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM tbl_tamu"))['jumlah'];
?>

<div class="container col-lg-12 mt-4">
    <!-- Statistik Pengunjung -->
    <div class="container col-lg-12 mt-4" style="width: 100%;">
        <div class="row justify-content-center mb-4">
        <div class="col-lg-12 mb-3">
            <div class="card shadow-lg border-0" style="background-color: #2d2f45; margin-top: 20px;">
                <div class="card-body text-white rounded" style="padding: 20px;">
                    <div class="text-center mb-4">
                        <h1 class="h4 font-weight-bold" style="color: #4e73df;">Statistik Pengunjung</h1>
                        <p class="text-muted">Data jumlah pengunjung berdasarkan periode waktu</p>
                    </div>
                    <div class="row justify-content-center">
                        <!-- Statistik Hari ini -->
                        <div class="col-md-2 col-sm-6 mb-3 text-center">
                            <div><i class="fas fa-calendar-alt fa-3x mb-2" style="color: #1cc88a;"></i></div>
                            <h6>Hari ini</h6>
                            <span class="badge badge-success p-2"><?= $hari_ini; ?></span>
                        </div>

                        <!-- Statistik Kemarin -->
                        <div class="col-md-2 col-sm-6 mb-3 text-center">
                            <div><i class="fas fa-business-time fa-3x mb-2" style="color: #36b9cc;"></i></div>
                            <h6>Kemarin</h6>
                            <span class="badge badge-info p-2"><?= $kemarin; ?></span>
                        </div>

                        <!-- Statistik Minggu Ini -->
                        <div class="col-md-2 col-sm-6 mb-3 text-center">
                            <div><i class="fas fa-book fa-3x mb-2" style="color: #4e73df;"></i></div>
                            <h6>Minggu ini</h6>
                            <span class="badge badge-primary p-2"><?= $minggu_ini; ?></span>
                        </div>

                        <!-- Statistik Bulan Ini -->
                        <div class="col-md-2 col-sm-6 mb-3 text-center">
                            <div><i class="fas fa-industry fa-3x mb-2" style="color: #f6c23e;"></i></div>
                            <h6>Bulan ini</h6>
                            <span class="badge badge-warning p-2"><?= $bulan_ini; ?></span>
                        </div>

                        <!-- Statistik Keseluruhan -->
                        <div class="col-md-2 col-sm-6 mb-3 text-center">
                            <div><i class="fas fa-chart-bar fa-3x mb-2" style="color: #e74a3b;"></i></div>
                            <h6>Keseluruhan</h6>
                            <span class="badge badge-danger p-2"><?= $keseluruhan; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>


    </div>
    <!-- Tombol untuk Membuka Modal -->
    <div class="d-flex justify-content-center mt-3">
        <button type="button" class="btn btn-primary btn-lg font-weight-bold shadow" data-toggle="modal" data-target="#inputDataModal">
            <i class="fas fa-user-plus"></i> Input Data Pengunjung
        </button>
    </div>

    <!-- Modal Input Data Pengunjung -->
    <div class="modal fade" id="inputDataModal" tabindex="-1" role="dialog" aria-labelledby="inputDataModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="inputDataModalLabel"><i class="fas fa-user-plus"></i> Input Data Pengunjung</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="">
                    <div class="modal-body">
                        <input type="text" class="form-control mb-2" name="nama" placeholder="Nama Pengunjung" required>
                        <input type="text" class="form-control mb-2" name="alamat" placeholder="Alamat Pengunjung" required>
                        <input type="text" class="form-control mb-2" name="keperluan" placeholder="Keperluan Pengunjung" required>
                        <input type="text" class="form-control mb-2" name="instansi" placeholder="Asal Instansi" required>
                        <input type="tel" class="form-control mb-2" name="nohp" placeholder="No. HP Pengunjung" pattern="[0-9]+" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="bsimpan" class="btn btn-primary">Simpan Data</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Tabel Data Pengunjung -->
    <div class="card m-4">
        <div class="card-header bg-dark text-white">
            <h6>Data Pengunjung Hari Ini [<?= date('d-m-Y'); ?>]</h6>
        </div>
        <div class="card-body bg-light">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Pengunjung</th>
                            <th>Alamat</th>
                            <th>Keperluan</th>
                            <th>Instansi</th>
                            <th>No. HP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tgl = date('Y-m-d');
                        $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_tamu WHERE tanggal LIKE '%$tgl%' ORDER BY id DESC");
                        $no = 1;
                        while ($data = mysqli_fetch_array($tampil)) {
                            echo "<tr>
                                    <td>$no</td>
                                    <td>{$data['tanggal']}</td>
                                    <td>{$data['nama']}</td>
                                    <td>{$data['alamat']}</td>
                                    <td>{$data['keperluan']}</td>
                                    <td>{$data['instansi']}</td>
                                    <td>{$data['nohp']}</td>
                                  </tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include "footer.php"; ?>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
