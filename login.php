<?php 

include "header.php"; 
session_start();
ob_start();


if(isset($_SESSION["login"]))
	header("Location:admin.php");

?>

<div class="jumbotron mb-0">

	<div id="loginSayfasi" class="container shadow-lg col-md-4 text-white">
		<form action="kontrol.php" method="POST">
			<br>
			<div class="form-group">
				<label for="exampleInputEmail1">Email Adresi:</label>
				<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="b191210568@sakarya.edu.tr" required="">
			</div>

			<div class="form-group mb-3">
				<label for="exampleInputPassword1">Şifre:</label>
				<input type="password" name="sifre" class="form-control" id="exampleInputPassword1" placeholder="123" required="">
			</div>

			<button type="submit" class="btn btn-primary">Gönder</button>
		</form>
		<br><p>Email: b191210568@sakarya.edu.tr</p>
		<p>Şifre: 123</p><br>
	</div>
	<br>
	<br>
</div>

<?php include "footer.php"; ?>