<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            [
                'name' => 'alsó test',
                'duration' => 60,
                'price' => 3000
            ],
            [
                'name' => 'teljes test',
                'duration' => 90,
                'price' => 12000
            ],
            [
                'name' => 'nyak | hát | váll',
                'duration' => 60,
                'price' => 7000
            ],
            [
                'name' => 'talp',
                'duration' => 30,
                'price' => 6000
            ],
            [
                'name' => 'felső test',
                'duration' => 45,
                'price' => 9000
            ]
            ]);
    }
}
