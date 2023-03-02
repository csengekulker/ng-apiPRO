<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointments')->insert([
            [
                'date' => '2022-01-01',
                'start' => '11:00',
                'end' => '12:00'
            ],
            [
                'date' => '2022-01-02',
                'start' => '12:00',
                'end' => '14:00'
            ],
            [
                'date' => '2022-01-03',
                'start' => '11:00',
                'end' => '11:45'
            ],
            [
                'date' => '2022-01-03',
                'start' => '11:45',
                'end' => '12:30'
            ],
            [
                'date' => '2022-01-03',
                'start' => '12:30',
                'end' => '14:00'
            ]
        ]);
    }
}
