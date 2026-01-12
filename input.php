<?php include "header.php"; ?>

<?php
    if (isset($_POST['bsimpan'])) {
        $tgl = date('Y-m-d');
        $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
        $alamat = htmlspecialchars($_POST['alamat'], ENT_QUOTES);
        $keperluan = htmlspecialchars($_POST['keperluan'], ENT_QUOTES);
        $instansi = htmlspecialchars($_POST['instansi'], ENT_QUOTES);
        $nohp = htmlspecialchars($_POST['nohp'], ENT_QUOTES);

        $simpan = mysqli_query($koneksi, "INSERT INTO tbl_tamu VALUES ('','$tgl', '$nama', '$alamat', '$keperluan', '$instansi', '$nohp')");

        if ($simpan) {
            echo "<script>alert('Simpan Data Sukses, Terima Kasih..!');document.location='?'</script>";
        } else {
            echo "<script>alert('Simpan Data Gagal!');document.location='?'</script>";
        }
    }
?>
<div class="col-lg-7 mb-3 mx-auto">
    <div class="card shadow-lg border-0" style="background-color: #f9f9f9;">
        <div class="card-body">
            <div class="text-center mb-4">
                <h1 class="h4 font-weight-bold" style="color: #4e73df;">Formulir Identitas Pengunjung</h1>
                <p class="text-muted">Isi data berikut dengan lengkap untuk keperluan pencatatan</p>
            </div>
            <form class="user" method="POST" action="">
                <div class="form-group">
                    <label for="nama" class="font-weight-bold" style="color: #333;">Nama Pengunjung</label>
                    <input type="text" class="form-control form-control-lg" name="nama" id="nama" placeholder="Masukkan Nama Pengunjung" required>
                </div>
                <div class="form-group">
                    <label for="alamat" class="font-weight-bold" style="color: #333;">Alamat Pengunjung</label>
                    <input type="text" class="form-control form-control-lg" name="alamat" id="alamat" placeholder="Masukkan Alamat Pengunjung" required>
                </div>
                <div class="form-group">
                    <label for="keperluan" class="font-weight-bold" style="color: #333;">Keperluan Pengunjung</label>
                    <textarea class="form-control form-control-lg" name="keperluan" id="keperluan" rows="3" placeholder="Masukkan Keperluan Pengunjung" required></textarea>
                </div>
                <div class="form-group">
                    <label for="instansi" class="font-weight-bold" style="color: #333;">Asal Instansi</label>
                    <input type="text" class="form-control form-control-lg" name="instansi" id="instansi" placeholder="Masukkan Asal Instansi" required>
                </div>
                <div class="form-group">
                    <label for="nohp" class="font-weight-bold" style="color: #333;">No. HP Pengunjung</label>
                    <input type="text" class="form-control form-control-lg" name="nohp" id="nohp" placeholder="Masukkan Nomor HP Pengunjung" required>
                </div>
                <button type="submit" name="bsimpan" class="btn btn-primary btn-user btn-block font-weight-bold" style="background-color: #4e73df; border: none;">
                    <i class="fas fa-save"></i> Simpan Data
                </button>
            </form>
            <hr>
            <div class="text-center">
                <a class="small text-muted" href="#">By KKL Mahasiswa Universitas Dian Nuswantoro | 2026 - <?= date('Y') ?></a>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
