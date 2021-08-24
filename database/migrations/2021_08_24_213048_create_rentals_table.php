<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->integer('scooter_id');
            $table->integer('user_id');
            $table->integer('rental_point_id');
            $table->string('reservation_time')->nullable();
            $table->integer('rental_status_id');
            $table->string('collateral_data')->nullable();
            $table->integer('cost')->nullable();
            $table->integer('manager_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rentals');
    }
}
