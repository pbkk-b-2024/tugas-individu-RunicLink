<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomServicesTable extends Migration
{
    public function up()
    {
        Schema::create('room_services', function (Blueprint $table) {
            $table->char('id', 6)->primary();
            $table->char('room_id', 6);
            $table->char('employee_id', 6);
            $table->date('service_date');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('room_services');
    }
}
