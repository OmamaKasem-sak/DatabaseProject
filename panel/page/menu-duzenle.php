<?php
if (isset($_GET["id"])) { //düzenlenecek menünün id'si geldi mi?
    $MenuID = $_GET["id"]; //geldi ise $MenuID değişkenine aktar.

    $kontrol = pg_query_params($db, 'SELECT  *  FROM "Menu" WHERE "MenuID"=$1', array($MenuID));
    //MenuID, Menu tablosunda var mı kontrol et.

    if ($kontrol) { //Menü var ise sayfayı göster.
        $row = pg_fetch_assoc($kontrol);
        ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Menü Düzenle</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= URL ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item active">Menü Düzenle</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->


            <section class="content">
                <div class="container-fluid" style="padding-bottom:32px!important;">
                    <?php
                    if ($_POST) {
                        if (isset($_POST["Title"]) && isset($_POST["Order"]) && isset($_POST["Url"])) {

                            $title = $_POST["Title"];
                            $order = $_POST["Order"];
                            $url = $_POST["Url"];

                            $kontrol = pg_query_params($db, 'UPDATE "Menu" SET "Title"=$1, "Order"=$2, "Url"=$3 WHERE "MenuID"=$4', array($title, $order, $url, $MenuID));

                            if ($kontrol) {
                                ?>
                                <meta http-equiv="refresh" content="1;">
                                <div class="alert alert-success">İşleminiz başarıyla kaydedildi..</div>
                                <?php
                            } else {
                                ?>
                                <div class="alert alert-danger">İşleminiz sırasında bir sorunla karşılaşıldı. Lütfen
                                    daha sonra tekrar deneyiniz.
                                </div>
                                <?php
                            }

                        } else {
                            ?>
                            <div class="alert alert-danger">Boş bıraktığınız alanları doldurunuz.</div>
                            <?php
                        }
                    }
                    ?>


                    <div class="col-md-12">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <!-- /.card-header -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Menü Düzenle</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- /.col -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Title">Başlık</label>
                                                <input type="text" class="form-control" placeholder="Başlık ..."
                                                       id="Title" value="<?= $row["Title"] ?>"
                                                       name="Title">
                                            </div>

                                            <div class="form-group">
                                                <label for="Url">Url</label>
                                                <input type="text" class="form-control" placeholder="Url ..."
                                                       id="Url" value="<?= $row["Url"] ?>"
                                                       name="Url">
                                            </div>

                                            <div class="form-group">
                                                <label for="Order">Sıra No</label>
                                                <input type="number" class="form-control" id="Order" value="<?= $row["Order"] ?>"
                                                       name="Order" style="width: 100px;">
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- /.row -->
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a href="<?= URL ?>menu-liste" class="btn btn-info"><i
                                            class="fas fa-bars"></i> Listeye Geri Dön</a>
                                    <button type="submit" class="btn btn-primary float-right">Kaydet
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        <?php
    }
}

?>