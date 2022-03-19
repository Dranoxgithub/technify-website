<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUrlAndTeamColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('projects', function (Blueprint $table) {
            $table->string('url')->nullable();
            $table->string('team')->nullable();
        });       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('url');
            $table->dropColumn('team');
        });       
    }
}