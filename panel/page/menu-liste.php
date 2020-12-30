<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Menü Listesi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= URL ?>">Anasayfa</a></li>
                        <li class="breadcrumb-item active">Menü Listesi</li>
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
                    <a href="<?= URL ?>menu-ekle" class="btn btn-success"
                       style="float:right;margin-bottom: 10px;"><i class="fa fa-plus"></i> Yeni Ekle</a>
                </div>
            </div>
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Menü Adı</th>
                            <th>Url</th>
                            <th>Sıra No</th>
                            <th style="width: 120px">İşlem</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $menu = pg_query($db, ' SELECT  *  FROM "Menu"');
                        while ($row = pg_fetch_assoc($menu) ){ ?>
                            <tr>
                                <td><?= $row["Title"] ?></td>
                                <td><?= $row["Url"] ?></td>
                                <td><?= $row["Order"] ?></td>
                                <td>

                                    <a href="<?=URL ?>menu-duzenle/<?= $row["MenuID"] ?>" class="btn btn-sm btn-warning">
                                        <i class="fas fa-pencil-alt" style="color:white"></i>
                                        <span style="color:white">Düzenle</span>
                                    </a>

                                    <a href="<?=URL ?>menu-sil/<?= $row["MenuID"] ?>" class="btn btn-sm btn-danger deleteArea">
                                        <i class="fas fa-trash"></i>
                                        Sil
                                    </a>

                                </td>
                            </tr>
                        <?php }?>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Menü Adı</th>
                            <th>Url</th>
                            <th>Sıra No</th>
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