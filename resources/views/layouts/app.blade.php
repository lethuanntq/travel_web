<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('vendors/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendors/dist/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Top Menu -->
        @include('layouts.top_menu')
    <!-- Top Menu -->

    <!-- Left Menu -->
        @include('layouts.left_menu')
    <!-- Left Menu -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content -->
        @yield('content')
        <!-- Content  -->
    </div>
    <!-- Right Menu -->
        @include('layouts.right_menu')
    <!-- Right Menu -->

    <!-- Footer Menu -->
{{--        @include('layouts.bottom_menu')--}}
    <!-- Footer Menu -->

</div>
<!-- ./wrapper -->
<div class="modal fade" id="delete-confirm-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document" style="margin-top: 15%">
        <div class="modal-content">
            <div class="modal-body" id="print-detail">削除してよろしいですか。</div>
            <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal" style="display: inline">いいえ</button>
                <button type="button" class="btn" onclick="event.preventDefault();document.getElementById('delete-form').submit();" style="display: inline">はい</button>
            </div>
            <form method="post" action="#" id="delete-form" class="d-none">
                @csrf
                @method('delete')
            </form>
        </div>
    </div>
</div>
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('vendors/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('vendors/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('vendors/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
@stack('scripts')
<script>
    $('#delete-confirm-modal').on('shown.bs.modal', function (event) {
        let target = $(event.relatedTarget);
        $('#delete-form').attr('action', target.data('action'));
    });
</script>
</body>
</html>
