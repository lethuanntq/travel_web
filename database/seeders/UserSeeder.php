<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'users';

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
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'phone_number' => '0123456789',
                'password' => bcrypt('123456789'),
                'role' => 1,
                'active' => 1
            ],
            [
                'name' => 'customer',
                'email' => 'customer@gmail.com',
                'phone_number' => '0123456789',
                'password' => bcrypt('123456789'),
                'role' => 2,
                'active' => 1
            ],
        ];
    }
}
