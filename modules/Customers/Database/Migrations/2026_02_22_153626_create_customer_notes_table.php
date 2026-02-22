<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * This is a pivot table for customers
     */
    public function up(): void
    {
        Schema::create('customer_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_topic_id')->constrained('customer_topics')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->text('content');
            $table->string('summary')->nullable();
            $table->dateTime('started_at')->nullable();
            $table->dateTime('improved_at')->nullable();
            $table->enum('status', ['ongoing', 'improved', 'stopped'])->default('ongoing');
            $table->timestamps();
            $table->index(['customer_topic_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers_notes');
    }
};
