<?php
if (isset($_GET["id"])) { //düzenlenecek menünün id'si geldi mi?
    $EducationID = $_GET["id"]; //geldi ise $MenuID değişkenine aktar.

    $kontrol = pg_query_params($db, 'SELECT  *  FROM "Education" WHERE "EducationID"=$1', array($EducationID));
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
                            <h1 class="m-0 text-dark">Eğitim Düzenle</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= URL ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item active">Eğitim Düzenle</li>
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
                        if (isset($_POST["School"]) && isset($_POST["Level"]) && isset($_POST["StartDate"]) && isset($_POST["EndDate"])) {

                            $school = $_POST["School"];
                            $level = $_POST["Level"];
                            $startDate = $_POST["StartDate"];
                            $endDate = $_POST["EndDate"];

                            $kontrol = pg_query_params($db, 'UPDATE "Education" SET "School"=$1, "Level"=$2, "StartDate"=$3, "EndDate"=$4 WHERE "EducationID"=$5', array($school, $level, $startDate, $endDate, $EducationID));

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
                                    <h3 class="card-title">Eğitim Düzenle</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- /.col -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="School">Okul</label>
                                                <input type="text" class="form-control" placeholder="Okul Adı ..."
                                                       id="School" value="<?= $row["School"] ?>"
                                                       name="School">
                                            </div>

                                            <div class="form-group">
                                                <label for="Level">Düzey</label>
                                                <input type="text" class="form-control" placeholder="Lisans, lise, ortaokul, ilkokul, dil eğitimi..."
                                                       id="Level" value="<?= $row["Level"] ?>"
                                                       name="Level">
                                            </div>

                                            <div class="form-group">
                                                <label for="StartDate">Başlangıç Tarihi</label>
                                                <input type="text" class="form-control"
                                                       id="StartDate" value="<?= $row["StartDate"] ?>"
                                                       name="StartDate">
                                            </div>


                                            <div class="form-group">
                                                <label for="EndDate">Bitiş Tarihi</label>
                                                <input type="text" class="form-control" id="EndDate" value="<?= $row["EndDate"] ?>"
                                                       name="EndDate">
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- /.row -->
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a href="<?= URL ?>edu-liste" class="btn btn-info"><i
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