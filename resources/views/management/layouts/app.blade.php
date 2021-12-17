<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Main style -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('travel/switch.css') }}">
</head>
<body class="hold-transition sidebar-mini" style="background-color: white">
<div class="wrapper">
    <!-- Top Menu -->
        @include('management.layouts.top_menu')
    <!-- Top Menu -->

    <!-- Left Menu -->
        @include('management.layouts.left_menu')
    <!-- Left Menu -->

{{--   Content--}}
    <div class="content-wrapper mt-3">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">@yield('title')</h3>
                </div>
                <div class="card-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- Right Menu -->
        @include('management.layouts.right_menu')
    <!-- Right Menu -->

    <!-- Footer Menu -->
        @include('management.layouts.bottom_menu')
    <!-- Footer Menu -->

</div>

<!-- modal form -->
<div class="modal fade" id="delete-confirm-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document" style="margin-top: 15%">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Xác nhận</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="print-detail">Bạn có chắc chắn muốn xóa không?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="display: inline">Không</button>
                <button type="button" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('delete-form').submit();" style="display: inline">Có</button>
            </div>
            <form method="post" action="#" id="delete-form" class="d-block">
                @csrf
                @method('delete')
            </form>
        </div>
    </div>
</div>

<!-- REQUIRED SCRIPTS -->
<!-- Main script -->
<script src="{{ asset('js/app.js') }}"></script>
<!-- CKEditor -->
<script src="{{ asset('js/http_cdn.ckeditor.com_ckeditor5_31.0.0_classic_ckeditor.js') }}"></script>
@include('ckfinder::setup')
<script type="text/javascript">
    $('#delete-confirm-modal').on('show.bs.modal', function (event) {
        let target = $(event.relatedTarget);
        $('#delete-form').attr('action', target.data('action'));
    });

    function priority(data) {
        var id = $(data).data('id');
        $.ajax({
           url : '{{ route('management.post.highlight') }}?id=' + id,
           type : "POST",
       }).done(function (response) {
           if(response.status) {
               $('#highlight-message').removeClass('danger alert-danger');
               $('#highlight-message').addClass('success alert-success');
          } else {
               $('#highlight-message').removeClass('success alert-success');
               $('#highlight-message').addClass('danger alert-danger');
               $(data).prop('checked', false);
          }

           $('#highlight-message').text(response.message);
           $('#highlight-message').css('display', 'block');
       }).fail(function (error) {
           console.log(error);
       })
    }

    function checkDisplay(data) {
        var id = $(data).data('id');
        $.ajax({
            url : '{{ route('management.tour.display') }}?id=' + id,
            type : "POST",
        }).done(function (response) {
            if(response.status) {
                $('#display-message').removeClass('danger alert-danger');
                $('#display-message').addClass('success alert-success');
            } else {
                $('#display-message').removeClass('success alert-success');
                $('#display-message').addClass('danger alert-danger');
                $(data).prop('checked', false);
            }

            $('#display-message').text(response.message);
            $('#display-message').css('display', 'block');
        }).fail(function (error) {
            console.log(error);
        })
    }
</script>

@stack('scripts')
</body>
</html>
