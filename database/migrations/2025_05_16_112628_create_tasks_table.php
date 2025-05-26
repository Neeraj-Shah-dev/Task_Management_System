<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('tasks', function (Blueprint $table) {
        $table->id();
        $table->string('task_id')->unique();
        $table->string('title');
        $table->text('description');
        $table->date('deadline');
        $table->enum('status', ['Pending', 'In Progress', 'Completed']);

        // Foreign key referencing employee_id (string) instead of id (int)
        $table->string('assigned_to');
        $table->foreign('assigned_to')->references('employee_id')->on('employees')->onDelete('cascade');

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
