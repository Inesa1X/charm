<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('city')->nullable();
            $table->string('salon')->nullable();
            $table->string('salon_address')->nullable();
            $table->string('category')->nullable();
            $table->string('procedure')->nullable();
            $table->string('master_id')->nullable();
            $table->string('master_name')->nullable();
            $table->string('master_email')->nullable();
            $table->string('master_avatar')->nullable();
            $table->string('user')->nullable();
            $table->string('user_email')->nullable();
            $table->float('price')->nullable();
            $table->date('date')->nullable();
            $table->string('date_type');
            $table->time('time')->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
