<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('orderNo');
            $table->string('customer');
            $table->string('origin');
            $table->string('tf');
            $table->string('show');
            $table->integer('boothNo');
            $table->string('carrier');
            $table->DECIMAL('estPrice');
            $table->date('shipDate');
            $table->date('dlvDate');
            $table->string('stopNo');
            $table->mediumText('comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
