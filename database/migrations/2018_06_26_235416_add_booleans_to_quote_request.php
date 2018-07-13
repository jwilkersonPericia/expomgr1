<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBooleansToQuoteRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('quote_requests', function ($table) {
          $table->string('p_show')->after('p_zip');
          $table->string('p_venue')->after('p_show');
          $table->string('p_booth')->after('p_venue');
          $table->string('d_show')->after('d_zip');
          $table->string('d_venue')->after('d_show');
          $table->string('d_booth')->after('d_venue');
          $table->boolean('hand1');
          $table->boolean('hand2');
          $table->boolean('shut1');
          $table->boolean('shut2');
          $table->boolean('p_limit1');
          $table->boolean('p_limit2');
          $table->boolean('d_limit1');
          $table->boolean('d_limit2');
          $table->boolean('serv1');
          $table->boolean('serv2');
          $table->boolean('serv3');
          $table->boolean('serv4');
          $table->boolean('serv5');
          $table->boolean('serv6');
          $table->integer('equip1');
          $table->integer('equip2');
          $table->integer('equip3');
          $table->integer('equip4');
          $table->dropColumn('b_phone');
          $table->dropColumn('boothNo');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quote_requests', function ($table) {
          $table->dropColumn('p_show');
          $table->dropColumn('p_venue');
          $table->dropColumn('p_booth');
          $table->dropColumn('d_show');
          $table->dropColumn('d_venue');
          $table->dropColumn('d_booth');
          $table->dropColumn('hand1');
          $table->dropColumn('hand2');
          $table->dropColumn('shut1');
          $table->dropColumn('shut2');
          $table->dropColumn('p_limit1');
          $table->dropColumn('p_limit2');
          $table->dropColumn('d_limit1');
          $table->dropColumn('d_limit2');
          $table->dropColumn('serv1');
          $table->dropColumn('serv2');
          $table->dropColumn('serv3');
          $table->dropColumn('serv4');
          $table->dropColumn('serv5');
          $table->dropColumn('serv6');
          $table->dropColumn('equip1');
          $table->dropColumn('equip2');
          $table->dropColumn('equip3');
          $table->dropColumn('equip4');
          $table->string('b_phone')->after('b_zip');
          $table->string('boothNo')->after('d_lateDate');
        });
    }
}
