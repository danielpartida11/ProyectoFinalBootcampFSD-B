<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@admin.soy',
                'password' => bcrypt('admin'),
                'dni' => '00000000A',
                'sex' => 'nulo',
                'role' => true,

            ]
        ]);
    }
}
