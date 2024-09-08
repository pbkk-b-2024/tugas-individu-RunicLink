<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('service_reservations', function (Blueprint $table) {
            $table->char('id', 6)->primary();
            $table->char('service_id', 6);
            $table->char('reservation_id', 6);
            $table->integer('quantity')->default(1);
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('reservation_id')->references('id')->on('reservations');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_reservations');
    }
}
