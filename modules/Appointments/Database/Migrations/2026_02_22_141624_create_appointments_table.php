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
            if (!Schema::hasTable('appointments')) {
                $table->id();
                $table->uuid('appointment_uuid')->unique();
                $table->foreignId('user_id')->constrained()->cascadeOnDelete();
                $table->string('google_event_id')->nullable()->index();
                $table->enum('status', ['booked','cancelled','completed'])->default('booked');
                $table->dateTime('start_time')->index();
                $table->dateTime('end_time')->index();
                $table->timestamps();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('appointments');
        Schema::enableForeignKeyConstraints();
    }
};
