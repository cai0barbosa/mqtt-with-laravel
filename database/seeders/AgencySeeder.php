<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        DB::table('agencies')->insert(
            [
                'name'    => Str::random(10),
                'email'   => Str::random(10).'@example.com',
                'address' => '123 Main St',
                'phone'   => '555-555-5555',
                'status'  => 'active',
            ]
        );
    }
}
