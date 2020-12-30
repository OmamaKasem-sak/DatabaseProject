<?php 

include "header.php"; 
ob_start();
session_start();

if(!isset($_SESSION["login"]))
	header("Location:index.php");

?>

<div class="jumbotron mb-0">
	<div id="adminSayfasi" class="container shadow-lg col-md-4 text-center text-white"><br>
		Admin sayfasına hoşgeldiniz <?php echo $_SESSION["email"] ?><br><br>
		(Session kullanılmıştır yeniden giriş için çıkış yapın.)
		<a class="btn btn-danger mt-3" href=logout.php>Güvenli Çıkış</a></center><br><br>
	</div><br><br><br><br><br><br><br><br><br><br>
</div>

<?php include "footer.php";   ?>


