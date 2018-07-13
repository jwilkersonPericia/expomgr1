<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteConcatFieldsFromQuoteRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('quote_requests', function ($table) {
        $table->dropColumn('sHandling');
        $table->dropColumn('shuttle');
        $table->dropColumn('p_limitations');
        $table->dropColumn('d_limitations');
        $table->dropColumn('specialServices');
        $table->string('p_limitOpt')->after('p_limit2');
        $table->string('d_limitOpt')->after('d_limit2');
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
        $table->string('sHandling')->after('roundTrip');
        $table->string('shuttle')->after('sHandling');
        $table->string('p_limitations')->after('p_phone');
        $table->string('d_limitations')->after('d_phone');
        $table->mediumText('specialServices')->after('urgent');
        $table->dropColumn('p_limitOpt');
        $table->dropColumn('d_limitOpt');
      });

    }
}
