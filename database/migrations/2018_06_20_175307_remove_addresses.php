<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveAddresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('addresses');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::create('addresses', function (Blueprint $table) {
          $table->increments('id');
          $table->string('customer_id');
          $table->string('line1');
          $table->string('line2');
          $table->string('city');
          $table->string('state');
          $table->string('zip');
          $table->string('phone');
          $table->timestamps();
      });
    }
}
