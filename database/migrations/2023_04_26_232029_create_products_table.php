<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_category');
            $table->string('product_description');
            $table->foreignId('customer_id')->constrained();
            $table->decimal('customer_phone');
            $table->string('customer_name');
            $table->string('seller');
            $table->string('paid');
            $table->date('order_date');
            $table->float('old-price');
            $table->float('actual-price');
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
