<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class serviceseder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'service_id'=>1,
            'service_type'=>normale,
            'customer_id'=>1,
            'customer_phone'=>076611071,
            'customer_name'=>mohamed,
            'seller'=>salwa,
            'paid'=>'yes',
            'order_date'=>2023-27-4,
            'price'=>120
        ],[
            'service_id'=>2,
            'service_type'=>complet,
            'customer_id'=>2,
            'customer_phone'=>0613102344,
            'customer_name'=>elmahdi,
            'seller'=>salwa,
            'paid'=>'no',
            'order_date'=>2023-27-3,
            'price'=>170
        ]);
    }
}
