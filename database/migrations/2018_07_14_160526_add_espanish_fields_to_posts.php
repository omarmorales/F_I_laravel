<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEspanishFieldsToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('posts', function(Blueprint $table) {
        $table->string('title_es');
        $table->longText('description_es')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('posts', function(Blueprint $table) {
        $table->dropColumn('title_es');
        $table->dropColumn('description_es');
      });
    }
}
