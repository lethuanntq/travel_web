@extends('travel.layout.app')
@section('travel_content')
    <div class="content">
        <div class="container">
            <div class="col-sm-12">
                <div class="card" data-aos="fade-up">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <h1><b>Giới thiệu về công ty</b></h1>
                                <p>Công ty Travel JSC có tên thương hiệu là Công ty du lịch Việt, tên giao dịch tiếng Anh là Travel Co.,Ltd.</p>
                                <p>Trụ sở chính: 99 Trần Hưng Đạo, Quận 1, TP. Hồ Chí Minh</p>
                                <p>Chi nhánh Hà Nội: Tòa nhà Sudico, Nam Từ Liêm, Hà Nội</p>
                                <div class="text-center mt-3">
                                    <img src="{{ asset('travel/assets/images/about/gioithieu.jpg') }}" width="500">
                                </div>
                                <p class="mt-3">
                                    Với đội ngũ nhân viên trẻ, yêu nghề có đam mê du lịch, năng động, nắm bắt thông tin tốt. Cùng sự góp sức của các Hướng dẫn viên, Chuyên gia Du lịch dày dặn kinh nghiệm am hiểu tâm lý khách hàng, địa phương, điểm đến đã cùng Giấc Mơ Việt không ngừng sáng tạo thiết kế thành công Giấc Mơ Du Lịch cho nhiều Quý khách hàng. Qua đó khơi dậy tình yêu đất nước, con người Việt Nam cũng như quảng bá hình ảnh Việt Nam ra thế giới với niềm tự hào sâu sắc về quê hương mình.
                                </p>
                                <p>
                                    Song song đó, chúng tôi còn là nhà tư vấn các tua, chương trình đặc biệt theo yêu cầu của Quý khách hàng và tận tâm phục vụ cung cấp thông tin nhanh chóng, chính xác đáp ứng nhu cầu đi du lịch ngày càng cao, đa dạng của Quý khách hàng trong và ngoài nước.
                                </p>

                                <p class="mt-3"><b>Sứ mệnh của chúng tôi</b></p>
                                <p>
                                    “ Sứ mệnh của chúng tôi là trở thành một Doanh nghiệp Lữ hành hàng đầu Việt Nam. Tận tâm phục vụ những khách hàng trong thị trường mà Công ty có được”
                                </p>

                                <p class="mt-3"><b>Triết lý của chúng tôi: </b></p>
                                <p>Khách hàng là giá trị cơ bản của bất kỳ doanh nghiệp nào, là lý do duy nhất để doanh nghiệp tồn tại và phát triển. Chính sách “khách hàng là trung tâm” như kim chỉ nam soi đường cho mọi hoạt động của doanh nghiệp.</p>
                                <p> - Chúng tôi luôn luôn lắng nghe và chia sẻ mong muốn của từng Quý khách hàng, mang lại cho Quý khách sự hài lòng về dịch vụ cũng như thái độ phục vụ của từng nhân viên trong chuyến đi, sao cho mỗi dịch vụ đơn lẻ là một mắt xích kết nối hoàn hảo giá trị chuyến đi của Quý khách. Mỗi tình cảm, hạnh phúc hay mức độ hài lòng của Quý khách là một viên gạch xây dựng lên thành công và giá trị của Công ty. </p>

                                <p class="mt-3"><b>Đội ngũ của chúng tôi:</b></p>
                                <p>Đội ngũ nhân viên văn phòng, điều hành tua, hướng dẫn viên của chúng tôi đều tự tin thông thạo ít nhất hai ngôn ngữ tiếng Việt và tiếng Anh. Đã từng làm việc trong các Công ty Lữ hành có ít nhất 10 năm kinh nghiệm cũng như được Tổng cục Du lịch Việt Nam cấp phép hoạt động trong lĩnh vực Dẫn tua du lịch quốc tế. </p>
                                <p>Với kinh nghiệm đó chúng tôi không ngừng mang mang đến cho Quý khách hàng chương trình du lịch hoàn hảo về điểm đến nổi tiếng trong cả nước cũng như không ngừng mở rộng khám phá đưa và khai thác các điểm du lịch mới. </p>
                                <div class="text-center mt-3">
                                    <img src="{{ asset('travel/assets/images/about/nhan-vien-cong-ty.jpg') }}" width="500">
                                </div>
                                <p class="mt-3"><b>Định hướng phát triển của công ty: </b></p>
                                <p>- Giữ vững và ngày càng tăng tốc độ phát triển trên mọi chỉ tiêu: doanh số, thị phần, nhân lực, giá trị thương hiệu, số lượng sản phẩm độc đáo (thiết kế tua trọn gói, tua theo yêu cầu, cung cấp dịch vụ đơn lẻ như: bán vé máy bay, vé tàu, phòng khách sạn, dịch vụ vận chuyển khác...) </p>
                                <p>- Phát huy và nâng cao thế mạnh sẵn có của công ty về thiết kế tua trọn gói cho những nhóm nhỏ, nhóm gia đình đơn lẻ, tua đặc biệt cho từng sự kiện để phục vụ nhu cầu ngày càng cao, đa dạng của khách hàng trong thời kỳ hội nhập với thế giới nhanh chóng như hiện nay. </p>
                                <p>- Với mong muốn không ngừng phát huy chất lượng sản phẩm và thái độ phục vụ Quý khách hàng ngày càng tận tụy, chu đáo. Chúng tôi luôn sẵn sàng tiếp nhận và biết ơn thông tin góp ý của Quý khách. </p>
                            </div>
                            <div class="col-lg-4">
                                @include('travel.layout.right_menu',  $highlightPosts)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
