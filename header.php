
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi Buku Tamu</title>
    <link rel="icon" href="assets/img/logo-dprd-salatiga.png" type="image/x-icon">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,900" rel="stylesheet">
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1e1e2f;
            color: #fff;
            font-family: 'Nunito', sans-serif;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #2a2a3c;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .header .logo {
            display: flex;
            align-items: center;
        }

        .header img {
            width: 70px;
            margin-right: 15px;
        }

        .header h1 {
            font-size: 24px;
            margin: 0;
            font-weight: bold;
        }

        .header p {
            margin: 0;
            font-size: 14px;
            color: #a5a5c3;
        }

        .header .logout {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header .btn-logout {
            background-color: #ff4757;
            color: #fff;
            font-weight: bold;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.3s;
        }

        .header .btn-logout:hover {
            background-color: #e63946;
            box-shadow: 0 4px 6px rgba(255, 71, 87, 0.4);
        }

        /* Style untuk tombol rekapitulasi */
        .header .btn-rekap {
            background-color: #00b894;
            color: #fff;
            font-weight: bold;
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.3s;
            box-shadow: 0 4px 6px rgba(0, 184, 148, 0.3);
        }

        .header .btn-rekap:hover {
            background-color: #00a55e;
            box-shadow: 0 4px 8px rgba(0, 184, 148, 0.5);
        }

        /* Memberikan jarak antar elemen */
        .header .logout a {
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="logo">
            <img src="assets/img/logo-dprd-salatiga.png" alt="Logo DPRD">
            <div>
                <h1>Sistem Informasi Buku Tamu</h1>
                <p>Sekretariat DPRD Kota Salatiga</p>
            </div>
        </div>
        <div class="logout">
            <a href="admin.php" class="btn-rekap"><i class="fa fa-home"></i> Home</a>
            <a href="rekapitulasi.php" class="btn-rekap"><i class="fa fa-table"></i> Rekapitulasi Pengunjung</a>
            <a href="logout.php" class="btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>
    <?php include "koneksi.php"; ?>
</body>

</html>

   