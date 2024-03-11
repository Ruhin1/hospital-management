<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        DB::table('settings')->insert([
            'name' => "BICTSOFT",
            'address' => "bictsoft",
            'mobile' => "000000000",
            'image'=> 'logo,jpg',
        ]);
    }








}
