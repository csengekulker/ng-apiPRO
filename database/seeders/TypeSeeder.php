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
                'name' => 'type1',
                'duration' => 60,
                'price' => 3000
            ],
            [
                'name' => 'type1plus',
                'duration' => 90,
                'price' => 6000
            ],
            [
                'name' => 'type2',
                'duration' => 30,
                'price' => 1000
            ],
            [
                'name' => 'type2plus',
                'duration' => 45,
                'price' => 2000
            ]
            ]);
    }
}
