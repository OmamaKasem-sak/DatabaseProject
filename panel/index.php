<?php
@session_start(); //oturum işlemleri için.
@ob_start(); //yönlendirme ve header işlemleri için.

include_once("../lib/db.php");
define("URL", "http://localhost/OmamaWeb/panel/");
define("MAINURL", "http://localhost/OmamaWeb/");

if (isset($_SESSION["Password"]) && isset($_SESSION["Email"])) {

} else {
    ?>
    <meta http-equiv="refresh" content="0;url=<?= URL ?>giris-yap">
    <?php
    exit();
}

?>

<!DOCTYPE html>
<html data-url="<?= URL ?>" data-mainurl="<?= MAINURL ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="keywords" content="">
    <meta http-equiv="description" content="">
    <title></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= URL ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?= URL ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= URL ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= URL ?>plugins/jqvmap/jqvmap.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= URL ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= URL ?>plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= URL ?>plugins/summernote/summernote-bs4.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= URL ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= URL ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= URL ?>plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= URL ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= URL ?>plugins/summernote/summernote-bs4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= URL ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php
    include_once("./data/header.php");
    include_once("./data/sidebar.php");

    if ($_GET && !empty($_GET["sayfa"])) {
        $sayfa = $_GET["sayfa"] . ".php";

        if (file_exists("./page/". $sayfa))
            include_once("./page/". $sayfa);
        else
            include_once("./page/home.php"); //eğer sayfayı bulamazsa anasayfayı açar.
    } else
        include_once("./page/home.php");

    include_once("./data/footer.php");
    ?>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= URL ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= URL ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= URL ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= URL ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= URL ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= URL ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= URL ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= URL ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= URL ?>plugins/moment/moment.min.js"></script>
<script src="<?= URL ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= URL ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= URL ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= URL ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= URL ?>dist/js/adminlte.js"></script>
<!-- DataTables -->
<script src="<?= URL ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= URL ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= URL ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= URL ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Select2 -->
<script src="<?= URL ?>plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= URL ?>dist/js/pages/dashboard.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= URL ?>dist/js/demo.js"></script>
<!-- Summernote -->
<script src="<?= URL ?>plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?= URL ?>dist/js/custom.js"></script>

<!-- page script -->
</body>
</html>
