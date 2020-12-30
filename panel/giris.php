<?php
@session_start(); //oturum işlemleri için.
@ob_start(); //yönlendirme ve header işlemleri için.

include_once("../lib/db.php");
define("URL", "http://localhost/OmamaWeb/panel/");
define("MAINURL", "http://localhost/OmamaWeb/");

if (isset($_SESSION["Password"]) && isset($_SESSION["Email"])) {
    ?>
    <meta http-equiv="refresh" content="0;url=<?= URL ?>">
    <?php exit();
} ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset=" utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="keywords" content="">
    <meta http-equiv="description" content="">
    <title>Yönetim Paneli</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= URL ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= URL ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= URL ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="giris.php"><b>Yönetim</b>Girişi</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Oturumunuzu başlatmak için giriş yapın</p>
            <?php
            if ($_POST) {
                if (isset($_POST["Email"]) && isset($_POST["Password"])) {
                    $Email = $_POST["Email"];
                    $Password = $_POST["Password"];
                    $kontrol = pg_query_params($db, 'SELECT  *  FROM "User" WHERE "Email"=$1 AND "Password"=$2', array($Email,$Password));
                    $row = pg_fetch_assoc($kontrol);
                    $adminKontrol = pg_query_params($db, 'SELECT  *  FROM "Admin" WHERE "UserID"=$1', array($row["UserID"]));
                    $rowAdmin = pg_fetch_assoc($adminKontrol);
                    if ($row) {
                        if($rowAdmin){
                            $_SESSION["Email"] = $row["Email"];
                            $_SESSION["Password"] = $row["Password"];
                            $_SESSION["FullName"] = $row["FullName"];
                            $_SESSION["UserID"] = $row["UserID"];
                        ?>
                        <meta http-equiv="refresh" content="0;url=<?= URL ?>">
                        <?php
                        } else {
                            echo '<div class="alert alert-warning">Admin değilsiniz, giriş izniniz bulunmamaktadır.</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger">Kullanıcı adı veya şifre hatalıdır.</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger">Boş bıraktığınız alanları doldurunuz.</div>';
                }
            }
            ?>

            <form action="#" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="Email" placeholder="E-posta adresiniz">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="Password" placeholder="Şifreniz">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Beni Hatırla
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Giriş Yap</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= URL ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= URL ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= URL ?>dist/js/adminlte.min.js"></script>

</body>
</html>
