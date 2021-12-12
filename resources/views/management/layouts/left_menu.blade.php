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
                <img src="@isset(auth()->user()->avatar) {{ auth()->user()->avatar }} @else {{ asset( 'avatar/'. 'default-avatar.jpg') }} @endisset" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('management.home') }}" class="nav-link">
                        <i class="nav-icon fas fa-industry"></i>
                        <p>Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('management.post.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Quản lý bài viết
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('management.tour.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-bus-alt"></i>
                        <p>
                            Quản lý tour
                            <i class="right fas fa-angle-right"></i>
                        </p>
                    </a>
                </li>

                @if(auth()->user()->role == \App\Models\User::ROLE_ADMIN)
                    <li class="nav-item">
                        <a href="{{ route('management.booking.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-address-book"></i>
                            <p>
                                Quản lý booking
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('management.account.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Quản lý tài khoản
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('management.setting.edit')}}" class="nav-link">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Quản lý hệ thống
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
