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
        Schema::create('course_lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->foreignId('instructor_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->foreignId('chapter_id')->constrained('course_chapters')->onDelete('cascade');
            $table->string('file_path')->nullable();
            $table->enum('storage', ['upload', 'youtube', 'vimeo', 'external_link'])->default('upload');
            $table->string('volume')->nullable();
            $table->string('duration')->nullable();
            $table->enum('file_type', ['video', 'audio', 'pdf', 'docx', 'file'])->default('video');
            $table->boolean('downloadable')->default(0);
            $table->integer('order')->default(0);
            $table->boolean('is_preview')->default(0);
            $table->boolean('status')->default(1);
            $table->enum('lesson_type', ['lesson', 'live'])->default('lesson');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_lessons');
    }
};
