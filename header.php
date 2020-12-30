<?php

require_once "./lib/db.php";

$menu = pg_query($db, ' SELECT  *  FROM "Menu" ORDER BY "Order"');


?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/style.css">

  <title>Omama Kasem - B191210568</title>
</head>
<body>

  <!-- Menü başlangıç -->
  <nav class="navbar navbar-light navbar-dark navbar-expand-lg">
    <div class="container"> <!-- Menü içeriğini ortalamak için  -->
      <a class="navbar-brand" href="index.php">Omama Kasem</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">

            <?php while ($row = pg_fetch_assoc($menu) ){ ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $row["Url"] ?>"><?= $row["Title"] ?></a>
                </li>
            <?php }?>

        </ul>
      </div>


      <a class="btn btn-outline-warning d-none d-lg-inline-block mb-3 mb-md-0 ml-md-3" href="panel">Giriş</a>

    </div>
  </nav>
  <!-- Menü bitiş -->