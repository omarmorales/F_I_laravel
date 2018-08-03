<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToApplications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('applications', function(Blueprint $table) {
        $table->longText('how_hear_aboutus')->nullable();
        $table->integer('situation')->nullable();
        $table->float('average')->nullable();
        $table->longText('themes')->nullable();
        $table->longText('stata')->nullable();
        $table->longText('future')->nullable();
        $table->longText('whyinterested')->nullable();
        $table->longText('whyhireyou')->nullable();
        $table->longText('comments')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('applications', function(Blueprint $table) {
        $table->dropColumn('how_hear_aboutus');
        $table->dropColumn('situation');
        $table->dropColumn('average');
        $table->dropColumn('themes');
        $table->dropColumn('stata');
        $table->dropColumn('future');
        $table->dropColumn('whyinterested');
        $table->dropColumn('whyhireyou');
        $table->dropColumn('comments');
      });
    }
}
