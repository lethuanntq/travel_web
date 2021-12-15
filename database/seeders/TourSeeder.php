<?php

namespace Database\Seeders;

use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'tours';

        Schema::disableForeignKeyConstraints();

        DB::table($table)->truncate();

        DB::table($table)->insert($this->getData());

        DB::table($table)->update([
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);

        Schema::enableForeignKeyConstraints();
    }

    protected function getData()
    {
        return [
            [
                'title' => 'Combo du lịch Phan Thiết Khách Sạn Sealink Villa',
                'slug' => 'combo-du-lich-phan-thiet-khach-san-sealink-villa-1',
                'tag' => 'du lịch, thăm quan',
                'short_description' => 'Combo du lịch Phan Thiết Khách Sạn Sealink Villa',
                'description' => ' Bạn đang tìm kiếm gì cho chuyến du lịch sắp tới của mình? Một thành phố biển sôi động nhưng cũng không thiếu những khoảnh khắc bình yên cho bạn thư giãn sau những ngày chăm chỉ làm việc? Một chút nắng, một chút gió, cùng biển xanh cát vàng cho bạn tha hồ đắm mình vào làn nước mát?
 Phan Thiết có đủ cả: từ cảnh quan thiên nhiên đa dạng của đồi cát bay Mũi Né, những hòn đảo lớn nhỏ; đến những di tích lịch sử minh chứng cho nền văn minh Chăm Pa hưng thịnh một thời… Có lẽ bởi những điều thú vị này mà du lịch Phan Thiết chưa bao giờ hết hot và chắc chắn lại càng sôi động mỗi khi hè về.',
                'seo_description' => 'Du lịch Phan Thiết từ trước đến nay luôn nổi tiếng với những bãi biển xanh trong và những đồi cát trải dài tít tắp.',
                'seo_tag' => 'du lịch, thăm quan',
                'thumbnail' =>  asset('/no-image.jpg'),
                'type' => '1',
                'price' => '500000',
                'price_promotion' => '80000',
                'start_date' => null,
                'end_date' => null,
                'created_by' => 1,
                'destination_id' => 1
            ],
            [
                'title' => 'Combo du lịch Phan Thiết Khách Sạn Sealink Villa 1',
                'slug' => 'combo-du-lich-phan-thiet-khach-san-sealink-villa-2',
                'tag' => 'du lịch, thăm quan',
                'short_description' => 'Combo du lịch Phan Thiết Khách Sạn Sealink Villa',
                'description' => ' Bạn đang tìm kiếm gì cho chuyến du lịch sắp tới của mình? Một thành phố biển sôi động nhưng cũng không thiếu những khoảnh khắc bình yên cho bạn thư giãn sau những ngày chăm chỉ làm việc? Một chút nắng, một chút gió, cùng biển xanh cát vàng cho bạn tha hồ đắm mình vào làn nước mát?
 Phan Thiết có đủ cả: từ cảnh quan thiên nhiên đa dạng của đồi cát bay Mũi Né, những hòn đảo lớn nhỏ; đến những di tích lịch sử minh chứng cho nền văn minh Chăm Pa hưng thịnh một thời… Có lẽ bởi những điều thú vị này mà du lịch Phan Thiết chưa bao giờ hết hot và chắc chắn lại càng sôi động mỗi khi hè về.',
                'seo_description' => 'Du lịch Phan Thiết từ trước đến nay luôn nổi tiếng với những bãi biển xanh trong và những đồi cát trải dài tít tắp.',
                'seo_tag' => 'du lịch, thăm quan',
                'thumbnail' =>  asset('/no-image.jpg'),
                'type' => '1',
                'price' => '2600000',
                'price_promotion' => '2000000',
                'start_date' => null,
                'end_date' => null,
                'created_by' => 1,
                'destination_id' => 1
            ],
            [
                'title' => 'Combo du lịch Phan Thiết Khách Sạn Sealink Villa 2',
                'slug' => 'combo-du-lich-phan-thiet-khach-san-sealink-villa-3',
                'tag' => 'du lịch, thăm quan',
                'short_description' => 'Combo du lịch Phan Thiết Khách Sạn Sealink Villa',
                'description' => ' Bạn đang tìm kiếm gì cho chuyến du lịch sắp tới của mình? Một thành phố biển sôi động nhưng cũng không thiếu những khoảnh khắc bình yên cho bạn thư giãn sau những ngày chăm chỉ làm việc? Một chút nắng, một chút gió, cùng biển xanh cát vàng cho bạn tha hồ đắm mình vào làn nước mát?
 Phan Thiết có đủ cả: từ cảnh quan thiên nhiên đa dạng của đồi cát bay Mũi Né, những hòn đảo lớn nhỏ; đến những di tích lịch sử minh chứng cho nền văn minh Chăm Pa hưng thịnh một thời… Có lẽ bởi những điều thú vị này mà du lịch Phan Thiết chưa bao giờ hết hot và chắc chắn lại càng sôi động mỗi khi hè về.',
                'seo_description' => 'Du lịch Phan Thiết từ trước đến nay luôn nổi tiếng với những bãi biển xanh trong và những đồi cát trải dài tít tắp.',
                'seo_tag' => 'du lịch, thăm quan',
                'thumbnail' =>  asset('/no-image.jpg'),
                'type' => '0',
                'price' => '1000000',
                'price_promotion' => '800000',
                'start_date' => null,
                'end_date' => null,
                'created_by' => 1,
                'destination_id' => 1
            ],
            [
                'title' => 'Combo du lịch Phan Thiết Khách Sạn Sealink Villa 3',
                'slug' => 'combo-du-lich-phan-thiet-khach-san-sealink-villa-4',
                'tag' => 'du lịch, thăm quan',
                'short_description' => 'Combo du lịch Phan Thiết Khách Sạn Sealink Villa',
                'description' => ' Bạn đang tìm kiếm gì cho chuyến du lịch sắp tới của mình? Một thành phố biển sôi động nhưng cũng không thiếu những khoảnh khắc bình yên cho bạn thư giãn sau những ngày chăm chỉ làm việc? Một chút nắng, một chút gió, cùng biển xanh cát vàng cho bạn tha hồ đắm mình vào làn nước mát?
 Phan Thiết có đủ cả: từ cảnh quan thiên nhiên đa dạng của đồi cát bay Mũi Né, những hòn đảo lớn nhỏ; đến những di tích lịch sử minh chứng cho nền văn minh Chăm Pa hưng thịnh một thời… Có lẽ bởi những điều thú vị này mà du lịch Phan Thiết chưa bao giờ hết hot và chắc chắn lại càng sôi động mỗi khi hè về.',
                'seo_description' => 'Du lịch Phan Thiết từ trước đến nay luôn nổi tiếng với những bãi biển xanh trong và những đồi cát trải dài tít tắp.',
                'seo_tag' => 'du lịch, thăm quan',
                'thumbnail' =>  asset('/no-image.jpg'),
                'type' => '1',
                'price' => '555555',
                'price_promotion' => '333333',
                'start_date' => null,
                'end_date' => null,
                'created_by' => 1,
                'destination_id' => 1
            ],
            [
                'title' => 'Combo du lịch Phan Thiết Khách Sạn Sealink Villa 4',
                'slug' => 'combo-du-lich-phan-thiet-khach-san-sealink-villa-5',
                'tag' => 'du lịch, thăm quan',
                'short_description' => 'Combo du lịch Phan Thiết Khách Sạn Sealink Villa',
                'description' => ' Bạn đang tìm kiếm gì cho chuyến du lịch sắp tới của mình? Một thành phố biển sôi động nhưng cũng không thiếu những khoảnh khắc bình yên cho bạn thư giãn sau những ngày chăm chỉ làm việc? Một chút nắng, một chút gió, cùng biển xanh cát vàng cho bạn tha hồ đắm mình vào làn nước mát?
 Phan Thiết có đủ cả: từ cảnh quan thiên nhiên đa dạng của đồi cát bay Mũi Né, những hòn đảo lớn nhỏ; đến những di tích lịch sử minh chứng cho nền văn minh Chăm Pa hưng thịnh một thời… Có lẽ bởi những điều thú vị này mà du lịch Phan Thiết chưa bao giờ hết hot và chắc chắn lại càng sôi động mỗi khi hè về.',
                'seo_description' => 'Du lịch Phan Thiết từ trước đến nay luôn nổi tiếng với những bãi biển xanh trong và những đồi cát trải dài tít tắp.',
                'seo_tag' => 'du lịch, thăm quan',
                'thumbnail' =>  asset('/no-image.jpg'),
                'type' => '0',
                'price' => '2500000',
                'price_promotion' => '803000',
                'start_date' => null,
                'end_date' => null,
                'created_by' => 1,
                'destination_id' => 1
            ],
            [
                'title' => 'Combo du lịch Phan Thiết Khách Sạn Sealink Villa 5',
                'slug' => 'combo-du-lich-phan-thiet-khach-san-sealink-villa-6',
                'tag' => 'du lịch, thăm quan',
                'short_description' => 'Combo du lịch Phan Thiết Khách Sạn Sealink Villa',
                'description' => ' Bạn đang tìm kiếm gì cho chuyến du lịch sắp tới của mình? Một thành phố biển sôi động nhưng cũng không thiếu những khoảnh khắc bình yên cho bạn thư giãn sau những ngày chăm chỉ làm việc? Một chút nắng, một chút gió, cùng biển xanh cát vàng cho bạn tha hồ đắm mình vào làn nước mát?
 Phan Thiết có đủ cả: từ cảnh quan thiên nhiên đa dạng của đồi cát bay Mũi Né, những hòn đảo lớn nhỏ; đến những di tích lịch sử minh chứng cho nền văn minh Chăm Pa hưng thịnh một thời… Có lẽ bởi những điều thú vị này mà du lịch Phan Thiết chưa bao giờ hết hot và chắc chắn lại càng sôi động mỗi khi hè về.',
                'seo_description' => 'Du lịch Phan Thiết từ trước đến nay luôn nổi tiếng với những bãi biển xanh trong và những đồi cát trải dài tít tắp.',
                'seo_tag' => 'du lịch, thăm quan',
                'thumbnail' =>  asset('/no-image.jpg'),
                'type' => '1',
                'price' => '5000300',
                'price_promotion' => '1235689',
                'start_date' => null,
                'end_date' => null,
                'created_by' => 1,
                'destination_id' => 1
            ],
            [
                'title' => 'Combo du lịch Phan Thiết Khách Sạn Sealink Villa 6',
                'slug' => 'combo-du-lich-phan-thiet-khach-san-sealink-villa-7',
                'tag' => 'du lịch, thăm quan',
                'short_description' => 'Combo du lịch Phan Thiết Khách Sạn Sealink Villa',
                'description' => ' Bạn đang tìm kiếm gì cho chuyến du lịch sắp tới của mình? Một thành phố biển sôi động nhưng cũng không thiếu những khoảnh khắc bình yên cho bạn thư giãn sau những ngày chăm chỉ làm việc? Một chút nắng, một chút gió, cùng biển xanh cát vàng cho bạn tha hồ đắm mình vào làn nước mát?
 Phan Thiết có đủ cả: từ cảnh quan thiên nhiên đa dạng của đồi cát bay Mũi Né, những hòn đảo lớn nhỏ; đến những di tích lịch sử minh chứng cho nền văn minh Chăm Pa hưng thịnh một thời… Có lẽ bởi những điều thú vị này mà du lịch Phan Thiết chưa bao giờ hết hot và chắc chắn lại càng sôi động mỗi khi hè về.',
                'seo_description' => 'Du lịch Phan Thiết từ trước đến nay luôn nổi tiếng với những bãi biển xanh trong và những đồi cát trải dài tít tắp.',
                'seo_tag' => 'du lịch, thăm quan',
                'thumbnail' =>  asset('/no-image.jpg'),
                'type' => '1',
                'price' => '5320000',
                'price_promotion' => '380000',
                'start_date' => null,
                'end_date' => null,
                'created_by' => 1,
                'destination_id' => 1
            ],
        ];
    }
}
