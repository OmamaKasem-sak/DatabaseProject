<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sosyal Medya Hesapları</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= URL ?>">Anasayfa</a></li>
                        <li class="breadcrumb-item active">Sosyal Medya Hesapları</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?= URL ?>soc-ekle" class="btn btn-success"
                       style="float:right;margin-bottom: 10px;"><i class="fa fa-plus"></i> Yeni Ekle</a>
                </div>
            </div>
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Sosyal Medya</th>
                            <th>Url</th>
                            <th style="width: 120px">İşlem</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $socialMedia = pg_query($db, ' SELECT  *  FROM "SocialMedia"');
                        while ($row = pg_fetch_assoc($socialMedia) ){ ?>
                            <tr>
                                <td><?= $row["Title"] ?></td>
                                <td><?= $row["Url"] ?></td>
                                <td>

                                    <a href="<?=URL ?>soc-duzenle/<?= $row["SocialMediaID"] ?>" class="btn btn-sm btn-warning">
                                        <i class="fas fa-pencil-alt" style="color:white"></i>
                                        <span style="color:white">Düzenle</span>
                                    </a>

                                    <a href="<?=URL ?>soc-sil/<?= $row["SocialMediaID"] ?>" class="btn btn-sm btn-danger deleteArea">
                                        <i class="fas fa-trash"></i>
                                        Sil
                                    </a>

                                </td>
                            </tr>
                        <?php }?>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Sosyal Medya</th>
                            <th>Url</th>
                            <th>İşlem</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>