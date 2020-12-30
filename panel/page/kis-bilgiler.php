<?php
    $kontrol = pg_query($db, 'SELECT  *  FROM "PersonalInfo"');

    if ($kontrol) {
        $row = pg_fetch_assoc($kontrol);
        ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Kişisel Bilgiler</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?= URL ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item active">Kişisel Bilgiler</li>
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
                        if (isset($_POST["FullName"]) && isset($_POST["Age"]) && isset($_POST["Hobby"]) && isset($_POST["FavoriteSpor"]) && isset($_POST["School"]) && isset($_POST["Department"]) && isset($_POST["Country"])) {

                            $fullName = $_POST["FullName"];
                            $age = $_POST["Age"];
                            $hobby = $_POST["Hobby"];
                            $favoriteSpor = $_POST["FavoriteSpor"];
                            $school = $_POST["School"];
                            $department = $_POST["Department"];
                            $country = $_POST["Country"];
                            $personalInfoID = $row["PersonalInfoID"];


                            $kontrol = pg_query_params($db,
                                'UPDATE "PersonalInfo" SET "Fullname"=$1, "Age"=$2, "Hobby"=$3, "FavoriteSpor"=$4, "School"=$5, "Department"=$6, "Country"=$7 WHERE "PersonalInfoID"=$8',
                                array($fullName, $age, $hobby, $favoriteSpor, $school, $department, $country, $personalInfoID));

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
                                    <h3 class="card-title">Kişisel Bilgiler</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- /.col -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="FullName">Adınız ve soyadınız</label>
                                                <input type="text" class="form-control" placeholder="Adınız ve soyadınız ..."
                                                       id="FullName" value="<?= $row["Fullname"] ?>"
                                                       name="FullName">
                                            </div>

                                            <div class="form-group">
                                                <label for="Age">Yaşınız</label>
                                                <input type="text" class="form-control" placeholder="Yaşınız ..."
                                                       id="Age" value="<?= $row["Age"] ?>"
                                                       name="Age">
                                            </div>

                                            <div class="form-group">
                                                <label for="Hobby">Hobileriniz</label>
                                                <input type="text" class="form-control" placeholder="Hobileriniz ..."
                                                       id="Hobby" value="<?= $row["Hobby"] ?>"
                                                       name="Hobby">
                                            </div>

                                            <div class="form-group">
                                                <label for="FavoriteSpor">Sevdiğiniz sporlar</label>
                                                <input type="text" class="form-control" placeholder="Sevdiğiniz sporlar ..."
                                                       id="FavoriteSpor" value="<?= $row["FavoriteSpor"] ?>"
                                                       name="FavoriteSpor">
                                            </div>

                                            <div class="form-group">
                                                <label for="School">Okulunuz</label>
                                                <input type="text" class="form-control" placeholder="Okulunuz ..."
                                                       id="School" value="<?= $row["School"] ?>"
                                                       name="School">
                                            </div>

                                            <div class="form-group">
                                                <label for="Department">Bölümünüz</label>
                                                <input type="text" class="form-control" placeholder="Bölümünüz ..."
                                                       id="Department" value="<?= $row["Department"] ?>"
                                                       name="Department">
                                            </div>

                                            <div class="form-group">
                                                <label for="Country">Memleketiniz</label>
                                                <input type="text" class="form-control" placeholder="Memleketiniz ..."
                                                       id="Country" value="<?= $row["Country"] ?>"
                                                       name="Country">
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- /.row -->
                            </div>
                            <div class="row">
                                <div class="col-12">
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

?>