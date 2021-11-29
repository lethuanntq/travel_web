<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('vendors/dist/img/travel-logo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Travel WebSite</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @php
                    $avatar = \App\Models\Image::query()->where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->first();
                    $pathImage = isset($avatar) ? $avatar->path_image : 'default-avatar.jpg';
                @endphp
                <img src="{{asset( 'avatar/'. $pathImage)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            DashBoard
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('management.post.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Quản lý bài viết
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('management.tour.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Quản lý tour
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('management.customer.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Quản lý khách hàng
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('management.account.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Quản lý tài khoản
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
