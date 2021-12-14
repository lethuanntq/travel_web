<html>
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Travel | @yield('title')</title>
    <!-- plugin css for this page -->
    <link
        rel="stylesheet"
        href="{{ asset('travel/assets/vendors/mdi/css/materialdesignicons.min.css') }}"
    />
    <link rel="stylesheet" href="{{ asset('travel/assets/vendors/aos/dist/aos.css/aos.css') }}" />

    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="{{ asset('travel/assets/images/favicon.png') }}" />

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('travel/assets/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owlcarousel/assets/owl.theme.default.min.css') }}">
    <!-- endinject -->
    <style>
        .post-title {
            font-size: 30px;
            line-height: 38px;
            color: #0055a5;
            font-weight: 500;
            text-align: justify;
        }
        .post-summary {
            color: #333;
            font-size: 15px;
            line-height: 22px;
            margin-bottom: 10px;
            text-align: justify;
            font-weight: 700;
        }
        .post-description {
            line-height: 22px;
            font-size: 15px;
            margin-bottom: 20px;
            color: #333;
            text-align: initial;
        }

        .owl-dots {
           display: none;
        }

        .size-destination {
            max-width: 450px ;
            position: relative
        }

        .size-banner-content {
            position: absolute;
            padding: 125px 0;
            left: 0px;
            bottom: 0px;
            color: #ffffff;
            width: 100%;
            display: inline-block;
            font-size: 130%;
            font-weight: 700;
            line-height: 1;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem;
        }

        .destinations-list {
            margin-right: -1.8%;
        }

        .destinations-list li {
            float: left;
            margin-right: 3%;
            margin-left: 3%;
            width: 18.2%;
            margin-bottom: 20px;
        }

        li {
            list-style: none;
        }

    </style>
</head>

<body>

<div class="container-scroller">
    <div class="main-panel">
        <!-- partial:partials/_navbar.blade.php -->
        <header id="header">
            <div class="container">
                @include('travel.layout.header')
            </div>
        </header>

        <!-- partial -->
        <div class="content-wrapper" style="font-family: 'Roboto'">
            <div class="container">
              @yield('travel_content')
            </div>
        </div>

        <footer style="font-family: 'Times New Roman'">
            @include('travel.layout.footer')
        </footer>

    </div>
</div>
<!-- inject:js -->
<script src="{{ asset('travel/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<script src="{{ asset('travel/assets/vendors/aos/dist/aos.js/aos.js') }}"></script>
<!-- End plugin js for this page -->
<!-- Custom js for this page-->
<script src="{{ asset('travel/assets/js/demo.js') }}"></script>
<!-- End custom js for this page-->

<script src="{{ asset('owlcarousel/owl.carousel.min.js') }}"></script>
@stack('travel-scripts')
</body>
</html>
