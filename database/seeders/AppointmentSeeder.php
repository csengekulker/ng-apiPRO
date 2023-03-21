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
            ],
            [
                'date' => '2022-01-03',
                'start' => '14:00',
                'end' => '16:00'
            ],
            [
                'date' => '2022-01-03',
                'start' => '16:30',
                'end' => '18:00'
            ],
            [
                'date' => '2022-01-04',
                'start' => '12:00',
                'end' => '13:00'
            ],
            [
                'date' => '2022-01-04',
                'start' => '13:30',
                'end' => '14:15'
            ],
            [
                'date' => '2022-01-04',
                'start' => '14:15',
                'end' => '15:00'
            ],
            [
                'date' => '2022-01-04',
                'start' => '15:00',
                'end' => '16:00'
            ]
        ]);
    }
}
