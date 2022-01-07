<div><b>Đã nhận được một booking mới!</b></div>
<div>Anh/Chị : <b>{{ $name }}</b></div>
<div>Url Booking : <b><a href="{{ route('management.booking.edit', $id) }}">Link</a></b></div>
<div>Số điện thoại : <b>{{ $phone }}</b></div>
<div>Ngày bắt đầu : <b>{{ $start_date }}</b></div>
<div>Ngày kết thúc : <b>{{ $end_date }}</b></div>
<div>Nội dung : <b>{{ $note }}</b></div>
<div style="margin-top: 10px;color: red"><b>Vui lòng liên hệ liên hệ để tiếp nhận tour!</b></div>
