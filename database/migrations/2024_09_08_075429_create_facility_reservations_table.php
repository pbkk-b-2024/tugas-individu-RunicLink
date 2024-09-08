<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilityReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('facility_reservations', function (Blueprint $table) {
            $table->char('id', 6)->primary();
            $table->char('facility_id', 6);
            $table->char('reservation_id', 6);
            $table->date('usage_date');
            $table->foreign('facility_id')->references('id')->on('facilities');
            $table->foreign('reservation_id')->references('id')->on('reservations');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('facility_reservations');
    }
}

