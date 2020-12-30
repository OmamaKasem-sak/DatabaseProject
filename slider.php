<?php

$slider = pg_query($db, ' SELECT  *  FROM "Slider" ORDER BY "Order"');
$slider2 = pg_query($db, ' SELECT  *  FROM "Slider" ORDER BY "Order"');

?>

<div class="container sliderMargin">
	
	<div  id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
		<ol class="carousel-indicators">
            <?php
            $count = 0;
            while ($row1 = pg_fetch_assoc($slider) ){
            if ($count!=0){
                echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$count.'"></li>';
            }else {
                echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$count.'" class="active"></li>';
            }
            ?>

            <?php $count++; } ?>
		</ol>

		<div class="carousel-inner text-center">

            <?php
            $count = 1;
            while ($row2 = pg_fetch_assoc($slider2) ){
                if ($count!=1){
                    echo '<div class="carousel-item">';
                }else {
                    echo '<div class="carousel-item active">';
                }
                ?>
                    <a href="#baslik1"><img class="d-block w-100" src="img/<?= $row2["Url"] ?>" alt="First slide"></a>
                    <div class="carousel-caption d-none d-md-block">
                        <b><h5 class="display-4 text-white"><?= $row2["Title"] ?></h5></b>
                        <p class="text-white"><?= $row2["Description"] ?></p>
                        <a class="btn btn-primary btn-sm mb-2" href="#baslik<?=$count?>">Devamını Oku</a>
                    </div>
                </div>

            <?php $count++; } ?>

		</div>

		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Geri</span>
		</a>

		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">İleri</span>
		</a>

	</div>
</div>