<nav class="navbar navbar-expand-lg navbar-light">
    <div class="navbar-top">
        <div class="d-flex justify-content-between align-items-center">
            <ul class="navbar-top-left-menu">
                <li class="nav-item">
                    <a href="{{ route('about-me') }}" class="nav-link">Về chúng tôi</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Liên hệ</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Quản lý tài khoản</a>
                </li>
            </ul>
            <ul class="navbar-top-right-menu">
                @auth
                    <li class="nav-item">
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">{{ auth()->user()->name }}</a>
                    </li>
                @else
                    <li class="nav-item">
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Sign in</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
    <div class="navbar-bottom">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <a class="navbar-brand" href="{{ route('home') }}"
                ><img src="{{ asset('travel/assets/images/logo.png') }}" alt=""
                    /></a>
            </div>
            <div>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="justify-content-center"
                    id="navbarSupportedContent">
                    <ul class="navbar-nav d-lg-flex justify-content-between ">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/magazine.html">Khuyến mại</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/business.html">Kinh nghiệm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/sports.html">Điểm đến</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/art.html">Thư viện</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/politics.html">Điểm đến của bạn</a>
                        </li>
                    </ul>
                </div>
            </div>
            <ul class="social-media">
                <li>
                    <a href="https://www.facebook.com/">
                        <i class="mdi mdi-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="https://www.youtube.com/">
                        <i class="mdi mdi-youtube"></i>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/">
                        <i class="mdi mdi-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="tel:123-456-7890">
                        <i class="mdi mdi-cellphone-basic"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>