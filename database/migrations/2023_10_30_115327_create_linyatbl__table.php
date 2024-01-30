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
        Schema::create('linyatbl_', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('appointment-queue');
            $table->string('student-name');
            $table->string('student-department');
            $table->string('student-course');
            $table->date('date-appointment');
            $table->string('appointment-status');
            $table->string('appointment-time');
            $table->string('appointment_reasons');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('linyatbl_');
    }
};
