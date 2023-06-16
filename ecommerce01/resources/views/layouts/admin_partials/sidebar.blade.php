<aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
            <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light"> </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Categorys
                        <i class="fas fa-angle-left right"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('category.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Categoy</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('subcategory.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Sub Category</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('childcategory.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Child Categoy</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('brand.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Brand</p>
                        </a>
                    </li>
                    </ul>
                </li>
                <li class="nav-header">Profile</li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" id="logout" class="nav-link">
                    <i class="nav-icon far fa-circle text-danger"></i>
                    <p class="text">Logout</p>
                    </a>
                </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>