<?php include "header.php"; ?>

<div class="row justify-content-center">
    <div class="col-md-10">
        <!--awal card-->
        <div class="card shadow-lg mb-4 mt-3 border-0">
            <div class="card-header bg-gradient-dark text-white text-center">
                <h4 class="m-0 font-weight-bold"><i class="fa fa-table"></i> Rekapitulasi Pengunjung</h4>
            </div>
            <div class="card-body bg-dark text-white">
                <!-- Form Pencarian -->
                <form method="POST" action="" class="mb-4">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal1" class="font-weight-bold">Dari Tanggal</label>
                                <input class="form-control" type="date" name="tanggal1" id="tanggal1" value="<?= isset($_POST['tanggal1']) ? $_POST['tanggal1'] : date('Y-m-d') ?>" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal2" class="font-weight-bold">Hingga Tanggal</label>
                                <input class="form-control" type="date" name="tanggal2" id="tanggal2" value="<?= isset($_POST['tanggal2']) ? $_POST['tanggal2'] : date('Y-m-d') ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-2">
                            <button class="btn btn-primary btn-block" name="btampilkan"><i class="fa fa-search"></i> Tampilkan</button>
                        </div>
                        
                    </div>
                </form>

                <?php if(isset($_POST['btampilkan'])): ?>
                <!-- Tabel Rekapitulasi -->
               <!-- Tabel Rekapitulasi -->
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered text-white">
        <thead class="bg-gradient-primary text-white">
            <tr class="text-center">
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Pengunjung</th>
                <th>Alamat</th>
                <th>Keperluan</th>
                <th>Instansi</th>
                <th>No. HP</th>
                <th>Aksi</th> <!-- Kolom Aksi -->
            </tr>
        </thead>
        <tbody>
            <?php
                $tgl1 = $_POST['tanggal1'];
                $tgl2 = $_POST['tanggal2'];
                $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_tamu WHERE tanggal BETWEEN '$tgl1' AND '$tgl2' ORDER BY id DESC");
                $no = 1;
                while($data = mysqli_fetch_array($tampil)) {
            ?>
            <tr class="text-center">
                <td><?= $no++ ?></td>
                <td><?= $data['tanggal'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['alamat'] ?></td>
                <td><?= $data['keperluan'] ?></td>
                <td><?= $data['instansi'] ?></td>
                <td><?= $data['nohp'] ?></td>
                <td>
                    <!-- Aksi Edit, Hapus, Lihat -->
                    <a href="edit.php?id=<?= $data['id'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                    <a href="hapus.php?id=<?= $data['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i> Hapus</a>
                    <a href="lihat.php?id=<?= $data['id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Lihat</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

                <!-- Tombol Export -->
                <div class="text-center mt-4">
                    <form method="POST" action="exportexcel.php">
                        <input type="hidden" name="tanggala" value="<?= @$_POST['tanggal1'] ?>">
                        <input type="hidden" name="tanggalb" value="<?= @$_POST['tanggal2'] ?>">
                        <button class="btn btn-success btn-lg"><i class="fa fa-download"></i> Export Data Excel</button>
                    </form>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <!--end card-->
    </div>
</div>


<?php include "footer.php"; ?> 