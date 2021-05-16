<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProjectDetailsColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->longText('reflection')->nullable();
            $table->string('status')->default('recruiting');
            $table->boolean('swe_needed')->default(false);
            $table->boolean('pm_needed')->default(false);
            $table->boolean('d_needed')->default(false);
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
            //
            $table->dropColumn('reflection');
            $table->dropColumn('status');
        });
    }
}
