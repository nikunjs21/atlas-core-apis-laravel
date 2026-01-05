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
    {   // id, created_by, title, description, assignee, status, created_at, updated_at
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workspace_id')->constrained()->cascadeOnDelete();
            $table->integer('created_by')->constrained('users');
            $table->string('title');
            $table->text('description')->nullable();
            $table->foreignId('assignee')->nullable()->constrained('users');
            $table->enum('status', ['todo', 'in_progress', 'review', 'qa', 'deployed', 'done'])->default('todo');
            $table->timestamps();

            $table->index(['workspace_id', 'assignee', 'status']);
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
