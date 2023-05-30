<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class productseder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'product_id'=>1,
            'product_name'=>'argane oil',
            'customer_id'=>1,
            'customer_phone'=>076611071,
            'customer_name'=>mohamed,
            'seller'=>salwa,
            'paid'=>'yes',
            'order_date'=>2023-27-4,
            'price'=>300
        ],[
            'product_id'=>2,
            'product_name'=>'honey',
            'customer_id'=>2,
            'customer_phone'=>0613102344,
            'customer_name'=>elmahdi,
            'seller'=>salwa,
            'paid'=>'yes',
            'order_date'=>2023-27-3,
            'price'=>500
        ]);
    }
}
