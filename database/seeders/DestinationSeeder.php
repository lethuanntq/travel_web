<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'destinations';

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
                'name' => 'Thái Bình',
                'slug' => 'thai-binh',
            ],
            [
                'name' => 'Hải Phòng',
                'slug' => 'hai-phong',
            ],
            [
                'name' => 'Hòa Bình',
                'slug' => 'hoa-binh',
            ],
        ];
    }
}
