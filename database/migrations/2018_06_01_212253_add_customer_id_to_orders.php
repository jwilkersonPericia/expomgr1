<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCustomerIdToOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //adding customer_id
        Schema::table('orders', function ($table) {
            $table->integer('customer_id')->after('customer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('orders', function ($table) {
          $table->dropColumn('customer_id');
      });
    }
}
