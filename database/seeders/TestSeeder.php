<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('childmenus')->insert([
            'name' => 'rm1cm1',
            'route' => 'rm1cm1',
            'status' => 1,
            'rootmenu_id'=> 1,
        ]);

        DB::table('childmenus')->insert([
            'name' => 'rm2cm2',
            'route' => 'rm2cm2',
            'status' => 1,
            'rootmenu_id'=> 2,
        ]);

        //------------

        DB::table('menuactions')->insert([
            'name'=> 'cm1ma1',
            'route'=>'cm1ma1',
            'status'=>1,
            'childmenu_id'=>1,
        ]);

        DB::table('menuactions')->insert([
            'name'=> 'cm1ma2',
            'route'=>'cm1ma2',
            'status'=>1,
            'childmenu_id'=>1,
        ]);

        DB::table('menuactions')->insert([
            'name'=> 'cm1ma3',
            'route'=>'cm1ma3',
            'status'=>1,
            'childmenu_id'=>1,
        ]);

        // -----------

        DB::table('menuactions')->insert([
            'name'=> 'cm2ma1',
            'route'=>'cm2ma1',
            'status'=>1,
            'childmenu_id'=>2,
        ]);

        DB::table('menuactions')->insert([
            'name'=> 'cm2ma2',
            'route'=>'cm2ma2',
            'status'=>1,
            'childmenu_id'=>2,
        ]);

        DB::table('menuactions')->insert([
            'name'=> 'cm2ma3',
            'route'=>'cm2ma3',
            'status'=>1,
            'childmenu_id'=>2,
        ]);
        



    }
}
