<html>
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Travel web</title>
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
        <div class="content-wrapper" style="font-family: 'Times New Roman'">
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
</body>
</html>
