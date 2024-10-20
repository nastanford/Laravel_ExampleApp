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
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Title of the to-do item
            $table->text('description')->nullable(); // Description (optional)
            $table->boolean('is_completed')->default(false); // Status: completed or not
            $table->date('due_date')->nullable(); // Optional due date for the task
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium'); // Task priority
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
