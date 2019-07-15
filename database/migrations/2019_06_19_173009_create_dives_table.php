<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dives', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('number');
            $table->dateTime('time');
            $table->string('location');
            $table->string('bottom_time');
            $table->string('max_depth');
            $table->integer('water_temp')->nullable();
            $table->boolean('day_night')->default(true);
            $table->integer('visibility')->nullable();
            $table->string('dive_start')->nullable();
            $table->string('current')->nullable();
            $table->string('tank_type')->nullable();
            $table->string('tank_capacity')->nullable();
            $table->integer('bar_start')->nullable();
            $table->integer('bar_end')->nullable();
            $table->string('gas_mix')->nullable();
            $table->string('belt_weights')->nullable();
            $table->string('bcd_weights')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dives');
    }
}
