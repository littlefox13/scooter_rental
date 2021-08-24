<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeigns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table){
            $table->foreignId('role_id')->constrained();
        });

        Schema::table('rentals', function (Blueprint $table){
            $table->foreignId('scooter_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('rental_point_id')->constrained();
            $table->foreignId('rental_status_id')->constrained('rental_statuses');
            $table->foreignId('manager_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table){
            $table->dropForeign('role_id');
        });
    }
}
