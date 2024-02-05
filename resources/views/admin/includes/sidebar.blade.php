<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.index') }}" class="brand-link">
        <img src="{{ asset('css/adminasset/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('css/adminasset/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.index') }}" class="d-block">Admin</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.index') }}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                            

   <!-- Categories Menu Item -->
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-list-alt"></i>
        <p>
            Categories
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.categories.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Category</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.categories.index') }}" class="nav-link"> <!-- Add this line -->
                <i class="far fa-circle nav-icon"></i>
                <p>List Categories</p> <!-- Add a label for listing categories -->
            </a>
        </li> 
    </ul>
</li>

        

        <!-- Posts Menu Item -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i> <!-- choose an appropriate icon -->
                <p>
                    Posts
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.posts.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Post</p>
                    </a>
                </li>
                <li class="nav-item">
            <a href="{{ route('admin.posts.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List Posts</p>
            </a>
        </li>   
            </ul>
        </li>  
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i> <!-- User Management icon -->
                <p>
                    User Management
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.user-management.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.user-management.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add User</p>
                    </a>
                </li>
            </ul>
        </li>
                
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Website Settings
                    <i class="fas fa-angle-left right"></i>
                    <span class="badge badge-info right">2</span>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.sitesetting.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Site Settings</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.sitesetting.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add New Site Settings</p>
                    </a>
                </li>
                @can('create posts')
                <li class="nav-item">
                    <a href="{{ route('admin.about.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>About Us</p>
                    </a>
                </li>
                        @endcan
            </ul>
        </nav>
    </div>
</aside>
