<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
            [
                'name' => 'Seat',
                'mnodel' => 'Leon',
                'fuel' => 'gasolina',
                'km' => '20000',
                'tank' => '40',
                'prize' => '18000'
            ],
            [
                'name' => 'Seat',
                'mnodel' => 'Ibiza',
                'fuel' => 'diesel',
                'km' => '15000',
                'tank' => '35',
                'prize' => '14000'
            ]
        ]);
    }
}











