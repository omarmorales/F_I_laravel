<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPublicToVacancies extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    // Add public column to Vcacancies
    Schema::table('vacancies', function(Blueprint $table) {
      $table->string('public')->nullable();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    //
    Schema::table('vacancies', function(Blueprint $table) {
      $table->dropColumn('public');
    });
  }
}
