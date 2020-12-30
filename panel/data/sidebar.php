<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $_SESSION["FullName"] ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="<?=URL ?>menu-liste" class="nav-link">
                        <i class="nav-icon fa fa-sliders-h"></i>
                        <p>
                            Menü
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Kişisel Bilgiler
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?=URL ?>kis-bilgiler" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Temel Bilgiler</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=URL ?>edu-liste" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Eğitim Bilgileri</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=URL ?>soc-liste" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sosyal Medya Hesapları</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?=URL ?>ayarlar" class="nav-link">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                            Ayarlar
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?=URL ?>cikis-yap" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Çıkış Yap
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
