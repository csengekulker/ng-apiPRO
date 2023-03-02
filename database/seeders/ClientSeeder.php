<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            [
                'fullName' => 'John Doe',
                'dob' => '1970-01-01',
                'email' => 'john@doe.com',
                'phone' => '123 456 789',
                'fullAddress' => '1234 City, Street st. 0.'
            ],
            [
                'fullName' => 'Jane Doe',
                'dob' => '1970-10-10',
                'email' => 'jane@doe.com',
                'phone' => '987 654 321',
                'fullAddress' => '4321 City, Road st. 0.'
            ]
        ]);
    }
}
