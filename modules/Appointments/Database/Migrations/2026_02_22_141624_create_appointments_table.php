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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->uuid('appointment_uuid')->unique();
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
            $table->enum('status', ['booked', 'cancelled', 'completed'])->default('booked')->index();
            $table->dateTime('start_time')->index();
            $table->dateTime('end_time')->index();
            $table->timestamps();
            $table->index(['customer_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
