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
        Schema::create('services', function (Blueprint $table) {
            $table->id('service_id');
            $table->string('service_type');
            $table->foreignId('customer_id')->constrained();
            $table->decimal('customer_phone');
            $table->string('customer_name');
            $table->string('seller');
            $table->string('paid');
            $table->date('order_date');
            $table->float('price');
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
};
