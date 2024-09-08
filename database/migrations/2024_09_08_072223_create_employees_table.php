<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->char('id', 6)->primary();
            $table->string('name', 100);
            $table->string('position', 50)->nullable();
            $table->decimal('salary', 10, 2)->nullable();
            $table->date('hire_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}

