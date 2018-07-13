<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuoteRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote_requests', function (Blueprint $table) {
          $table->increments('id');
          $table->string('shipType');
          $table->string('roundTrip');
          $table->string('sHandling');
          $table->string('shuttle');
          $table->string('customerName');
          $table->string('b_line1');
          $table->string('b_line2');
          $table->string('b_city');
          $table->string('b_state');
          $table->string('b_zip');
          $table->string('b_phone');
          $table->string('p_name');
          $table->string('p_type');
          $table->string('p_line1');
          $table->string('p_line2');
          $table->string('p_city');
          $table->string('p_state');
          $table->string('p_zip');
          $table->string('p_phone');
          $table->string('p_limitations');
          $table->date('p_earlyDate');
          $table->date('p_lateDate');
          $table->string('pInstructions');
          $table->string('d_name');
          $table->string('d_type');
          $table->string('d_line1');
          $table->string('d_line2');
          $table->string('d_city');
          $table->string('d_state');
          $table->string('d_zip');
          $table->string('d_phone');
          $table->string('d_limitations');
          $table->date('d_earlyDate');
          $table->date('d_lateDate');
          $table->string('boothNo');
          $table->string('dInstcutions');
          $table->string('contact_first');
          $table->string('contact_last');
          $table->string('contact_title');
          $table->string('contact_phone');
          $table->string('contact_email');
          $table->date('quoteBy');
          $table->boolean('urgent');
          $table->mediumText('specialServices');
          $table->mediumText('comments');
          $table->boolean('active');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quote_requests');
    }
}
