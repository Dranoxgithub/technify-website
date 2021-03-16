<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddUserTypeToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('type')->default('student');
        });
        
        $results = DB::table('users')->select('id')->get();
        
        foreach ($results as $result){
            if (count(DB::table('ngos')->where('user_id', $result->id)->get())) {
                $type = 'NGO';
            } else {
                $type = 'student';
            }
            DB::table('users')
                ->where('id', $result->id)
                ->update([
                    "type" => $type
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('type');
        });
    }
}
