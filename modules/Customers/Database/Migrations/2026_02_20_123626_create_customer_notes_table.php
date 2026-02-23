<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * This is a note table for customers
     */
    public function up(): void
    {
        Schema::create('customer_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->cascadeOnDelete();
            $table->foreignId('customer_topic_id')->constrained('customer_topics')->cascadeOnDelete();
            $table->text('content');
            $table->text('homework')->nullable();
            $table->string('summary')->nullable();
            $table->unsignedTinyInteger('intensity_scale')->nullable();
            $table->dateTime('started_at')->nullable();
            $table->dateTime('improved_at')->nullable();
            $table->enum('status', ['ongoing', 'improved', 'stopped', 'unimproved'])->default('ongoing');
            $table->timestamps();

            $table->index(['customer_topic_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('customer_notes');
        Schema::enableForeignKeyConstraints();
    }
};
