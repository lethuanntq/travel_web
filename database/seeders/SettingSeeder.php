<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'settings';

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
                'phone_number' => '1900 1177',
                'hot_line' => '028 7305 6789',
                'support_email' => 'lethuanqed@gmail.com',
                'headquarters' => '99 Trần Hưng Đạo, Quận 1, TP. Hồ Chí Minh',
                'branch_1' => 'Quận Hoàn Kiếm, Hà Nội',
                'branch_2' => '',
                'website' => 'travel-web-vn.herokuapp.com',
            ],
        ];
    }
}
