<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->char('id', 6)->primary();
            $table->char('guest_id', 6);
            $table->char('room_id', 6);
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->enum('status', ['Booked', 'Checked-in', 'Checked-out', 'Canceled'])->default('Booked');
            $table->timestamps();

            $table->foreign('guest_id')->references('id')->on('guests')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};

