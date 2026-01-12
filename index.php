<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login |Buku Tamu Sekretariat DPRD Kota Salatiga</title>
    <link rel="icon" href="assets/img/logo-dprd-salatiga.png" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f9fafb;
            color: #ffffff;
            font-family: 'Nunito', sans-serif;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            border-radius: 15px;
            overflow: hidden;
            background-color: #1e1e2f;
            color: #ffffff;
            width: 400px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }

        .profile-logo {
            width: 100px;
            height: 100px;
            background-color: #4e73df;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 10px;
        }

        .profile-logo img {
            width: 80%;
            height: auto;
        }

        .dprd-title {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-control {
            background-color: #2a2a40;
            color: #ffffff;
            border: 1px solid #4e73df;
            border-radius: 10px;
        }

        .form-control::placeholder {
            color: #c7c7c7;
        }

        .btn-login {
            background-color: #4e73df;
            color: #ffffff;
            border-radius: 10px;
        }

        .btn-login:hover {
            background-color: #375ab7;
        }

        a {
            color: #4e73df;
            text-decoration: none;
        }

        a:hover {
            color: #375ab7;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="card">
            <div class="profile-logo">
                <img src="assets/img/logo-dprd-salatiga.png" alt="Profile Logo">
            </div>
            <div class="dprd-title">
                <h2>Buku Tamu</h2>
                <p>Sekretariat DPRD Kota Salatiga</p>
            </div>
            <form action="cek_login.php" method="POST">
                <div class="form-group mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Masukkan Username">
                </div>
                <div class="form-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                </div>
                <div class="form-group form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Ingat Saya</label>
                </div>
                <button type="submit" class="btn btn-login btn-block">Login</button>
            </form>
            <div class="text-center mt-4">
                <a href="forgot-password.html">Lupa Password?</a>
            </div>
        </div>
    </div>
</body>

</html>
