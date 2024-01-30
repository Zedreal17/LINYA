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
        Schema::create('announcetbl_name', function (Blueprint $table) {
            $table->id();
            $table->string("announcement-details");
            $table->date("date-posted");
            $table->date("date-until");
            $table->string("announcement-status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcetbl_name');
    }
};
