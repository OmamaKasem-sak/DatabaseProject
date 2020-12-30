<?php
if (isset($_GET["id"])) {
    $SocialMediaID = $_GET["id"];

    $kontrol = pg_query_params($db, 'SELECT  *  FROM "SocialMedia" WHERE "SocialMediaID"=$1', array($SocialMediaID));

    if ($kontrol) {
        $row = pg_fetch_assoc($kontrol);
        ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Sosyal Medya Düzenle</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= URL ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item active">Sosyal Medya Düzenle</li>
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
                        if (isset($_POST["Title"]) && isset($_POST["Url"]) && isset($_POST["Class"])) {

                            $title = $_POST["Title"];
                            $url = $_POST["Url"];
                            $class = $_POST["Class"];

                            $kontrol = pg_query_params($db, 'UPDATE "SocialMedia" SET "Title"=$1, "Url"=$2, "Class"=$3 WHERE "SocialMediaID"=$4', array($title, $url, $class, $SocialMediaID));

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
                                    <h3 class="card-title">Sosyal Medya Düzenle</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- /.col -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Title">Sosyal Medya</label>
                                                <input type="text" class="form-control" placeholder=""
                                                       id="Title" value="<?= $row["Title"] ?>"
                                                       name="Title">
                                            </div>

                                            <div class="form-group">
                                                <label for="Url">Url</label>
                                                <input type="text" class="form-control" placeholder=""
                                                       id="Url" value="<?= $row["Url"] ?>"
                                                       name="Url">
                                            </div>

                                            <div class="form-group">
                                                <label for="Class">Class</label>
                                                <input type="text" class="form-control" placeholder="örn: fa fa-instagram"
                                                       id="Class" value="<?= $row["Class"] ?>"
                                                       name="Class">
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- /.row -->
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a href="<?= URL ?>soc-liste" class="btn btn-info"><i
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