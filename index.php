<?php
include "header.php";

$personalInfo = pg_query($db, ' SELECT  *  FROM "PersonalInfo" WHERE "PersonalInfoID"=1');
$rowPersonalInfo = pg_fetch_assoc($personalInfo);

$socialMedia = pg_query($db, ' SELECT  *  FROM "SocialMedia"');
$education = pg_query($db, ' SELECT  *  FROM "Education" ORDER BY "StartDate"');

?>

<div class="jumbotron anasayfaJumbotron">
	<div class="container">
		
		<br><br>
		<p class="baslik text-dark text-center">ANA SAYFA</p>
		<br><br>

	</div>
</div>

<div id="hakkinda" class="jumbotron">
	<div class="container">
		<h1 class="display-4 text-center">Benim adım Omama Kasem</h1>
		<p class="lead text-center">Suriye'de yaşadım. İki senedir Türkiye'de ailemle yaşıyorum.</p>
		<hr class="my-4">
		<div class="col-md-8 marginAuto">
			
			<h1 class="display-4 text-center">Kişisel Bilgiler</h1>
			<hr class="my-4">
			<table class=" table table-striped table-light text-dark">
				<thead>
					<tr>
						
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">İsimim</th>
						<td><?= $rowPersonalInfo["Fullname"] ?></td>
					</tr>
					<tr>
						<th scope="row">Yaşım</th>
						<td><?= $rowPersonalInfo["Age"] ?></td>
					</tr>
					<tr>
						<th scope="row">Okulum</th>
						<td><?= $rowPersonalInfo["School"] ?></td>
					</tr>
					<tr>
						<th scope="row">Bölümüm</th>
						<td><?= $rowPersonalInfo["Department"] ?></td>
					</tr>
					<tr>
						<th scope="row">Memleketim</th>
						<td><?= $rowPersonalInfo["Country"] ?></td>
					</tr>
					<tr>
						<th scope="row">Hobilerim</th>
						<td><?= $rowPersonalInfo["Hobby"] ?></td>
					</tr>
					<tr>
						<th scope="row">Sevdiğim Spor</th>
						<td><?= $rowPersonalInfo["FavoriteSpor"] ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class=" col-md-4 text-center marginAuto">
			<h1 class="display-4 text-center">Sosyal Medya</h1>
			<hr class="my-4">
            <?php while ($row = pg_fetch_assoc($socialMedia) ){ ?>
                <a href="<?= $row["Url"] ?>" target="_blank" class="<?= $row["Class"] ?>"></a>
            <?php }?>
		</div>

		<div class="marginAuto">
			
			<div class="container mt-5 mb-5">
				<div class="row">
					<div class="col-md-6 offset-md-3 ">

						<h1 class="display-4 text-center">Eğitim Bilgisi</h1>
						<hr class="my-4">
						<ul class="timeline">


                            <?php while ($rowEducation = pg_fetch_assoc($education) ){ ?>
                                <li>
                                    <a href="#"><?= $rowEducation["Level"] ?></a>
                                    <a href="#" class="float-right"><?= $rowEducation["StartDate"] ?> - <?= $rowEducation["EndDate"] ?></a>
                                    <p><?= $rowEducation["School"] ?></p>
                                </li>
                            <?php }?>

						</ul>
					</div>
				</div>
				

			</div>
		</div>
	</div>
</div>


<?php include "footer.php"; ?>