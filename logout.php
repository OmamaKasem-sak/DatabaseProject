<?php

include "header.php"; 

session_start();
ob_start();
session_destroy();

header("Refresh: 3; url=index.php");

ob_end_flush();

?>

<div class="jumbotron mb-0">
	<div id="adminSayfasi" class="container shadow-lg col-md-4 text-center text-white"><br>
		Çıkış yaptınız ana sayfaya yönlendiriliyorsunuz...<br><br>
	</div><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>

<?php include "footer.php"; ?>
