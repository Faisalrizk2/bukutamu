<?php
include "koneksi.php";

// Persiapan export ke file Excel
header("Content-Type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Rekapitulasi_Data_Tamu.xls");
header("Pragma: no-cache");
header("Expires: 0");

// Ambil periode dari form
$tgl1 = isset($_POST['tanggala']) ? $_POST['tanggala'] : date('Y-m-d');
$tgl2 = isset($_POST['tanggalb']) ? $_POST['tanggalb'] : date('Y-m-d');
$tanggalEkspor = date('d-m-Y H:i:s');
?>

<table border="1">
    <!-- Informasi Judul -->
    <thead>
        <tr>
            <th colspan="7" style="font-size: 18px; font-weight: bold; text-align: center;">
                Rekapitulasi Data Tamu
            </th>
        </tr>
        <tr>
            <th colspan="7" style="text-align: center;">
                Periode: <?= date('d-m-Y', strtotime($tgl1)) ?> s/d <?= date('d-m-Y', strtotime($tgl2)) ?>
            </th>
        </tr>
        <tr>
            <th colspan="7" style="text-align: center;">Diunduh pada: <?= $tanggalEkspor ?></th>
        </tr>
        <tr>
            <th colspan="7" style="height: 20px;"></th> <!-- Spasi kosong -->
        </tr>

        <!-- Header Tabel -->
        <tr style="background-color: #4CAF50; color: white; font-weight: bold;">
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
        // Query data tamu berdasarkan tanggal
        $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_tamu WHERE tanggal BETWEEN '$tgl1' AND '$tgl2' ORDER BY tanggal ASC");
        $no = 1;
        
        if(mysqli_num_rows($tampil) > 0) {
            while ($data = mysqli_fetch_array($tampil)) {
        ?>
            <tr>
                <td style="text-align: center;"><?= $no++ ?></td>
                <td style="text-align: center;"><?= date('d-m-Y', strtotime($data['tanggal'])) ?></td>
                <td style="text-align: left;"><?= $data['nama'] ?></td>
                <td style="text-align: left;"><?= $data['alamat'] ?></td>
                <td style="text-align: left;"><?= $data['keperluan'] ?></td>
                <td style="text-align: left;"><?= $data['instansi'] ?></td>
                <td style="text-align: center;"><?= $data['nohp'] ?></td>
            </tr>
        <?php 
            }
        } else { 
        ?>
            <tr>
                <td colspan="7" style="text-align: center; font-weight: bold; color: red;">Data tidak ditemukan untuk periode tersebut</td>
            </tr>
        <?php 
        } 
        ?>
    </tbody>
</table>
