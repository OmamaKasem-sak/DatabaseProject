<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Eğitim Ekle</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= URL ?>">Anasayfa</a></li>
                        <li class="breadcrumb-item active">Eğitim Ekle</li>
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
                if (isset($_POST["School"]) && isset($_POST["Level"]) && isset($_POST["StartDate"]) && isset($_POST["EndDate"]) ) {
                    $school = $_POST['School'];
                    $level = $_POST["Level"];
                    $startDate = $_POST["StartDate"];
                    $endDate = $_POST["EndDate"];

                    $kontrol = pg_query_params($db, 'INSERT INTO "Education"("School", "Level", "StartDate", "EndDate") VALUES($1, $2, $3, $4)', array($school, $level, $startDate, $endDate));

                    if ($kontrol) {
                        ?>
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
                            <h3 class="card-title">Eğitim Ekle</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- /.col -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="School">Okul</label>
                                        <input type="text" class="form-control" placeholder="Okul Adı ..."
                                               id="School"
                                               name="School">
                                    </div>

                                    <div class="form-group">
                                        <label for="Level">Düzey</label>
                                        <input type="text" class="form-control" placeholder="Lisans, lise, ortaokul, ilkokul, dil eğitimi..."
                                               id="Level"
                                               name="Level">
                                    </div>

                                    <div class="form-group">
                                            <label for="StartDate">Başlangıç Tarihi</label>
                                        <input type="text" class="form-control"
                                               id="StartDate"
                                               name="StartDate">
                                    </div>


                                    <div class="form-group">
                                        <label for="EndDate">Bitiş Tarihi</label>
                                        <input type="text" class="form-control" id="EndDate"
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
                            <button type="submit" class="btn btn-primary float-right"><i
                                        class="fas fa-save"></i> Kaydet
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>