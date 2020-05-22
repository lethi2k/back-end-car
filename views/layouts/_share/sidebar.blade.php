<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Thildph07746</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
    
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview ">
                    <a href="{{BASE_URL }}" class="nav-link ">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Trang Chủ
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list-ol"></i>
                        <p>
                            Hãng Xe
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{BASE_URL . 'brand'}}" class="nav-link">
                                <i class="fa fa-list-alt nav-icon"></i>
                                <p>Danh sách hãng xe</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{BASE_URL . 'brand/add'}}" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Thêm hãng xe</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-truck"></i>
                        <p>
                            Xe Oto
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{BASE_URL . 'cars'}}" class="nav-link">
                                <i class="fa fa-list-alt nav-icon"></i>
                                <p>Danh sách xe</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{BASE_URL . 'car/add'}}" class="nav-link">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Thêm xe</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>