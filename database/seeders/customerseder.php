<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class customerseder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer')->insert([
            'customer_id'=>1,
            'customer_name'=>'mohamed',
            'customer_phone'=>076611071
        ],
        [
             'customer_id'=>2,
            'customer_name'=>'elmahdi',
            'customer_phone'=>0613102344 
        ]);
    }
}
